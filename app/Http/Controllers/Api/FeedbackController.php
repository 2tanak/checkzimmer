<?php namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller {
    public function index() {
        return response()->json(Feedback::all());
    }
    public function store(Request $request) {
        $data = $request->all();
        $fb = Feedback::where('client_id', $data['client_id'])->first();
        if (!$fb) {
            $fb = new Feedback;
        }
        $fb->fill($data);
        $fb->save();
        return response()->json(['success' => true, 'data' => $fb->toArray()]);
    }
}
