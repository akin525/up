<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class listdata
{
public function list(Request $request)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.mcd.5starcompany.com.ng/api/reseller/list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'data','coded' => 'm'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
//    echo $response;
    $data = json_decode($response, true);
    $success = $data["success"];
    $product = $data["data"];

//    return $product;

    return view('pam', compact('product'));


}
}
