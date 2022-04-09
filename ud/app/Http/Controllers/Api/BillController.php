<?php
namespace App\Http\Controllers\Api;

use App\Mail\Emailtrans;
use App\Models\bo;
use App\Models\data;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;
use Mockery\Exception;

class BillController
{

    public function bill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productid' => 'required',
            'amount' => 'required',
            'number' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => Helpers::error_processor($validator)
            ], 403);
        }
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        if ($user) {
            $wallet = wallet::where('username', $user->username)->first();

            if ($wallet->balance < $request->amount) {
                $mg = "You Cant Make Purchase Above " . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return response()->json([
                    'message' => $mg,
                    'user' => $user
                ], 200);

            }
            if ($request->amount < 0) {

                $mg = "error transaction";
                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                ], 200);

            }
            $bo = bo::where('refid', $request->id)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                ], 200);

            } else {
                $bt = data::where("id", $request->productid)->get();

                $gt = $wallet->balance - $request->amount;


                $wallet->balance = $gt;
                $wallet->save();

                foreach ($bt as $fg) {

                    if ($fg->plan == "Airtime") {

                        $resellerURL = 'https://app.mcd.5starcompany.com.ng/api/reseller/';
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://test.mcd.5starcompany.com.ng/api/reseller/pay',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('service' => 'airtime', 'coded' => $fg->cat_id, 'phone' => $request->number, 'amount' => $request->amount, 'reseller_price' => $request->amount),

                            CURLOPT_HTTPHEADER => array(
                                'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
                            )));

                        $response = curl_exec($curl);

                        curl_close($curl);
//                    echo $response;
//    return;
                        $data = json_decode($response, true);
                        $success = $data["success"];
                        $tran1 = $data["discountAmount"];

//                        return $response;
                        if ($success==1) {
                            $bo = bo::create([
                                'username' => $user->username,
                                'plan' => $fg->plan,
                                'amount' => $request->amount,
                                'server_res' => $response,
                                'result' => $success,
                                'phone' => $request->number,
                                'refid' => $request->id,
                                'discountamoun' => $tran1,
                            ]);
                            $name= $fg->plan;
                            $am= "NGN $request->amount  Airtime Purchase Was Successful To";
                            $ph= $request->number;

                            $receiver=$user->email;
//                            try {
//                                Mail::to($receiver)->send(new Emailtrans($bo ));
//                            }catch (Exception $e){
//
//                            }
                            return response()->json([
                                'message' => $am, 'name' => $name, 'ph'=>$ph, 'success'=>$success,
                                'user' => $user
                            ], 200);

                        }elseif ($success==0){
                            $zo=$user->balance+$request->amount;
                            $user->balance = $zo;
                            $user->save();

                            $name= $fg->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";
                            return response()->json([
                                'message' => $am, 'name' => $name, 'ph'=>$ph, 'success'=>$success,
                                'user' => $user
                            ], 200);

                        }

                    } else {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://honourworld.ng/datatopup',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('action' => 'data-topup', 'category_id' => $fg->cat_id, 'plan_id' => $fg->plan_id, 'contact_opt' => '2', 'phone_num' => $request->number),
                            CURLOPT_HTTPHEADER => array(
                                'Cookie: PHPSESSID=be3030e3b1a0cb40c0b2c5903d05fdf6; lang=en-US; nplh=4915.13266a73e5010cb60ede277741fdb032; nplrmm=1'
                            ),
                        ));
                        $response = curl_exec($curl);

                        curl_close($curl);
                        // echo $response;


                        $data = json_decode($response, true);
                        $success = $data["result"];
                        $msg2 = $data["msg"];
                        if ($success==1){
                            $bo = bo::create([
                                'username' => $user->username,
                                'plan' => $fg->plan,
                                'amount' => $request->amount,
                                'server_res' => $response,
                                'result' => $success,
                                'phone' => $request->number,
                                'refid' => $request->id,
                            ]);
                            $name= $fg->plan;
                            $am= "$fg->plan  was successful delivered to";
                            $ph= $request->number;


                            $receiver=$user->email;
//                            try {
//                                Mail::to($receiver)->send(new Emailtrans($bo ));
//                            }catch (Exception $e){
//
//                            }
                            return response()->json([
                                'message' => $am, 'name' => $name, 'ph'=>$ph, 'success'=>$success,
                                'user' => $user
                            ], 200);

                        }elseif ($success==0){
                            $zo=$user->balance+$request->amount;
                            $user->balance = $zo;
                            $user->save();

                            $name= $fg->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";
                            return response()->json([
                                'message' => $am, 'name' => $name, 'ph'=>$ph, 'success'=>$success,
                                'user' => $user
                            ], 200);


                        }


                    }
                }
            }
        }
        return response()->json([
            'message' => "User not found",
        ], 200);


    }

}



