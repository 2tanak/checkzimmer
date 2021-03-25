<?php

namespace App\Http\Controllers\Api;

use App\Option;
use App\Services\GeocoderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain;

class DomainController extends Controller
{
    /**
     * @var GeocoderService
     */
    private $service;

    public function __construct(GeocoderService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Domain::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'subdomain'      => 'required',
            'city'   => 'required',
            'active'       => 'required',
        ]);
        $geo_data = $this->service->getCoords($request->get('city'));
        $data = $request->all();
        $item = new Domain($data);
        $item->save();

        if (!$item) {
            return response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
        }

        $optionsData = [
            'key'    => 'latlng',
            'parent' => $item->id,
            'type'   => 'domain',
            'value'  => json_encode(['lat' => $geo_data['lat'], 'lng' => $geo_data['lng']]),
        ];

        $geoOption = new Option($optionsData);
        $geoOption->save();

        $item->geo = $geoOption;

        return response()->json(['code' => 'ok', 'domain' => $item]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $domain = Domain::where('subdomain', $id)->first();
        $domain->options = Option::where('type', 'domain')->where('parent', $domain->id)->get()->pluck('value', 'key');
        return response()->json($domain);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'subdomain'      => 'required',
            'city'   => 'required',
            'active'       => 'required',
        ]);
        $geo_data = $this->service->getCoords($request->get('city'));
        $domain = Domain::where('subdomain', $id)->first();
        $data = $request->all();
        $domain->fill($data);
        $domain->save();
        $option = Option::where('type', 'domain')->where('parent', $domain->id)->where('key', 'latlng')->first();
        if (!$option) {
            $optionsData = [
                'key'    => 'latlng',
                'parent' => $domain->id,
                'type'   => 'domain',
                'value'  => json_encode(['lat' => $geo_data['lat'], 'lng' => $geo_data['lng']]),
            ];

            $geoOption = new Option($optionsData);
            $geoOption->save();
        }
        foreach ($data['options'] as $key => $value) {
            $option = Option::where('type', 'domain')->where('parent', $domain->id)->where('key', $key)->first();
            if (!$option) {
                $option = new Option();
            }
            $optionsData = [
                'key' => $key,
                'parent' => $domain->id,
                'type' => 'domain',
                'value' => $value,
            ];
            $option->fill($optionsData);
            $option->save();
        }

        $domain->geo = $option;

        return response()->json($domain);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Domain::find($id)->delete();
        if($result) {
            return response()->json(['code' => 'ok']);
        }
    }
}
