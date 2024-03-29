<?php

namespace app\Http\Controllers;

use App\Mail\Emailtrans;
use App\Models\bo;
use App\Models\data;
use App\Models\Messages;
use App\Models\refer;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AlltvController
{
    public function listtv(Request $request)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app2.mcd.5starcompany.com.ng/api/reseller/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'tv'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
        $data = json_decode($response, true);
        $plan= $data["data"];
foreach ($plan as $pla) {
    $id = $pla['type'];
    $name = $pla['name'];
    $amount = $pla['amount'];
    $code = $pla['code'];
//return $response;
    $bo = data::create([
        'plan_id' => $code,
        'code' => $code,
        'plan' => $name,
        'network' => $id,
        'amount' => $amount,
        'tamount' => $amount,
        'ramount' => $amount,
        'cat_id' => $code,
    ]);
}
    }

    public function verifytv($value1, $value2)
    {

        $resellerURL='https://app2.mcd.5starcompany.com.ng/api/reseller/';


        $curl = curl_init();


        curl_setopt_array($curl, array(

            CURLOPT_URL => $resellerURL.'validate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'tv', 'coded' =>$value2, 'phone' => $value1),
            CURLOPT_HTTPHEADER => array(
                'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
            )
        ));

                $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
//return $response;
        $data = json_decode($response, true);
        $success= $data["success"];
        $name=$data["data"];
        if ($success = 1){
            $log=$name;
        }else{
            $log= "Unable to Identify IUC Number";
        }

        return response()->json($log);


    }

    public function tv(Request $request, $selectedValue)
    {

            $user = User::find($request->user()->id);
            $tv = data::where('network', $selectedValue)->get();
            return response()->json($tv);


    }

        public function paytv(Request $request)
        {
            if (Auth::check()) {
                $user = User::find($request->user()->id);
                $tv = data::where('id', $request->id)->first();

                $wallet = wallet::where('username', $user->username)->first();


                if ($wallet->balance < $tv->tamount) {
                    $mg = "You Cant Make Purchase Above" . "NGN" . $tv->tamount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
                    return response()->json( $mg, Response::HTTP_BAD_REQUEST);

                }
                if ($tv->tamount < 0) {

                    $mg = "error transaction";
                    return response()->json( $mg, Response::HTTP_BAD_REQUEST);

                }
                $bo = bo::where('refid', $request->refid)->first();
                if (isset($bo)) {
                    $mg = "duplicate transaction";
                    return response()->json( $mg, Response::HTTP_CONFLICT);

                } else {
                    $gt = $wallet->balance - $tv->tamount;


                    $wallet->balance = $gt;
                    $wallet->save();

                    $resellerURL = 'https://app2.mcd.5starcompany.com.ng/api/reseller/';

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $resellerURL.'pay',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array('service' => 'tv', 'coded' => $tv->cat_id, 'phone' => $request->number),
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
                        )
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
//                    echo $response;
                    $data = json_decode($response, true);
                    $success = $data["success"];
                    $tran1 = $data["discountAmount"];

//                        return $response;
                    if ($success == 1) {

                        $bo = bo::create([
                            'username' => $user->username,
                            'plan' => $tv->network,
                            'amount' => $tv->tamount,
                            'server_res' => $response,
                            'result' => $success,
                            'phone' => $request->number,
                            'refid' => $request->refid,
                            'discountamoun' => $tran1,
                        ]);


                        $name = $tv->plan;
                        $am = $tv->network."was Successful to";
                        $ph = $request->number;

                        $receiver = $user->email;
                        $admin = 'admin@primedata.com.ng';

                        Mail::to($receiver)->send(new Emailtrans($bo));
                        Mail::to($admin)->send(new Emailtrans($bo));

                        return view('bill', compact('user', 'name', 'am', 'ph', 'success'));


                    }elseif ($success==0){
//                        $zo=$user->balance+$tv->tamount;
//                        $user->balance = $zo;
//                        $user->save();

                        $name= $tv->network;
                        $am= "NGN $request->amount Was Refunded To Your Wallet";
                        $ph=", Transaction fail";

                        return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                    }
                }
            }
        }

}
