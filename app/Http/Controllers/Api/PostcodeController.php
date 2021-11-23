<?php namespace App\Http\Controllers\Api;

use App\Domain;
use App\Postcode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class PostcodesController
 * Handles postcodes
 *
 * @package App\Http\Controllers\Api
 */

class PostcodeController extends Controller
{
    public function index()
    {
        return response()->json( Postcode::all() );
    }

    public function destroy($id)
    {
        Postcode::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    public function update(Request $request, $id)
    {
        Postcode::find($id)->update(['response' => $request->answer]);

        return response()->json(['code' => 'ok']);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['response'] = '';
        $item = new Postcode($data);
        $item->save();

        return response()->json(['code' => 'ok','postcode' => $item]);
    }
    public function query(Request $request) {
        $data = $request->all();
        $pcs = Postcode::where('city', 'like', "%{$data['input']}%")->orWhere('code', 'like', "%{$data['input']}%")->get()->toArray();
        foreach($pcs as $key => $pc) {
            $domain = Domain::where('city', $pc['city'])->first();
            if (!$domain) {
                unset($pcs[$key]);
                continue;
            }
            $pcs[$key]['domain'] = $domain->url();
            if (strpos($pcs[$key]['city'], $data['input']) !== false) {
                $pcs[$key]['text'] = str_replace($data['input'], "<strong>{$data['input']}</strong>", $pc['city']);
                $pcs[$key]['type'] = 'city';
            } else {
                $pcs[$key]['text'] = $pc['city'] .', ' . str_replace($data['input'], "<strong>{$data['input']}</strong>", $pc['code']);
                $pcs[$key]['type'] = 'code';
            }
        }
        $cities = [];
        foreach ($pcs as $key => $pc) {
            if ($pc['type'] != 'city') {
                continue;
            }
            if (array_search($pc['city'], $cities) !== false) {
                unset($pcs[$key]);
            }
            $cities[] = $pc['city'];
        }
        return response()->json($pcs);
    }
}
