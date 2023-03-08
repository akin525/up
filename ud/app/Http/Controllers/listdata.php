<?php

namespace App\Http\Controllers;
use App\Models\big;
use App\Models\data;
use Illuminate\Http\Request;


class listdata
{
    public function list(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.mcd.5starcompany.com.ng/api/reseller/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'data', 'coded' => '9'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: mcd_key_75rq4][oyfu545eyuriup1q2yue4poxe3jfd'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

        $d = json_decode($response, true);
        $data = $d['data'];
//return $data;
        foreach ($data as $plan) {
            $success = $plan["type"];
            $planid = $plan["code"];
            $price = $plan['amount'];
            $allowance = $plan['name'];
//    $validity =$plan['validity'];
            $insert = data::create([
                'plan_id' => $planid,
                'network' => $success,
                'plan' => $allowance,
                'code' => $planid,
                'amount' => $price,
                'tamount' => $price,
                'ramount' => $price,
                'cat_id' => $planid,
            ]);
        }

//    return $product;

//    return view('pam', compact('product'));


    }

    public function lis()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.honourworld.com/api/v1/get/data/plans',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Bearer sk_live_9a55cd84-8ad7-46d9-9136-c5962858f753'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
       return $response;
        $data = json_decode($response, true);
//return $data;
        foreach ($data as $plan) {
            $success = $plan["network"];
            $planid = $plan["planId"];
            $price = $plan['price'];
            $allowance = $plan['allowance'];
//    $validity =$plan['validity'];
            $insert = big::create([
                'plan_id' => $planid,
                'network' => $success,
                'plan' => $allowance,
                'code' => $planid,
                'amount' => $price,
                'tamount' => $price,
                'ramount' => $price,
                'cat_id' => $planid,
            ]);

        }
    }
}

