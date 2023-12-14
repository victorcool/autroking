<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class HttpClient
{
    static function post($end_point,$payload)
    {
        $APIKEY = 'MK_TEST_MJK5MWKM5G';
        $SecretKey = 'CL2H4U7KQWFMSSMZRVESVTG9SZDPMAXJ';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $end_point,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>$payload,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "cache-control: no-cache",
                "Authorization: Basic ".base64_encode($APIKEY . ':' . $SecretKey)
            ],
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        if ($err) {
            Log::error('HttpClient',[$err]);
            return json_encode(['statusCode' => '111', 'message' => 'Request Error', 'data' => null]);
        } else
            return $response;
    }

    static function get($end_point, $headers = [], $payload = null)
    {
        $headers = array_merge(array(
            "Accept: application/json",
            "Content-Type: application/json",
            "cache-control: no-cache"
        ), $headers);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $end_point,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error('HttpClient', [$err]);
            return (object) ['errorCode' => '111', 'message' => 'Request Error', 'data' => null];
        } else
            return $response;
    }
}
