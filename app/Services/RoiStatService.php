<?php

namespace App\Services;

use App\Option;
use GuzzleHttp;

class RoiStatService {
    const ROISTAT_URL = 'https://cloud.roistat.com/api/site/1.0/';
    const ROISTAT_GETPHONE = 'get-phone';
    private $apiKey = null;
    private $apiUrl = '';
    private $client = null;
    private $data = '';

    function __construct() {
        $this->apiKey = env('ROISTAT_KEY', '3471f90cb1269b9107391c11fb73fefc');
        $this->apiUrl = self::ROISTAT_URL.$this->apiKey;
        $this->client = new GuzzleHttp\Client(['base_uri' => $this->apiUrl]);
        $this->getPhoneData();
    }
    function getPhoneViaApi() {
        $response = $this->client->get($this->apiUrl . '/' . self::ROISTAT_GETPHONE);
        return $response->getBody();
    }
    function phoneDataCacheUpdate($key, $data) {
        $timestamp = Option::where('type', 'system')->where('key', $key)->first();
        if (!$timestamp) {
            $timestamp = new Option;
            $timestamp->fill([
                'type' => 'system',
                'parent' => 0,
                'key' => $key
            ]);
        }
        $timestamp->value = $data;
        $timestamp->save();
    }
    function getPhoneData() {
        $timestamp = Option::where('type', 'system')->where('key', 'roi_timestamp')->first();
        if (!$timestamp || $timestamp < time()) {
            $data = $this->getPhoneViaApi();
            preg_match("/\((.*?)\)/", $data, $matches);
            $data = explode(', ', $matches[1] ?? '');
            $this->data =
                stripslashes(
                        trim(
                            substr(
                                end($data),
                                1,
                                -1)
                        )
                );
            $this->phoneDataCacheUpdate('timestamp', time() + 3600);
            $this->phoneDataCacheUpdate('data', $this->data);
            return;
        }
        $this->data = Option::where('type', 'system')->where('key', 'roi_data')->first();
    }
    function getPhone($phone) {
        $data = json_decode($this->data, true);
        $phone = preg_replace('/[^0-9]/', '', $phone);
        foreach ($data as $block) {
            $phoneRep = preg_replace('/[^0-9]/', '', $block['phone']);
            if (array_search($phone, $block['replaceable_numbers']) !== false) {
                return $phoneRep;
            }
        }
        dd($data);
    }
}
