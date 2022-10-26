<?php

namespace App\Http\Controllers\Api;

use App\Console\encription;
use App\Mail\Emailtrans;
use App\Models\bill_payment;
use App\Models\bo;
use App\Models\data;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AirController
{
    public function airtime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'refid' => 'required',
            'amount' => 'required',
            'number' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $this->error_processor($validator)
            ], 403);
        }

        $apikey = $request->header('apikey');

        $user = User::where('apikey', $apikey)->first();
        if ($user) {
            $wallet = wallet::where('username', $user->username)->first();

            if ($wallet->balance < $request->amount) {
                $mg = "You Cant Make Purchase Above " . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                    'success' => 0
                ], 200);

            }
            if ($request->amount < 0) {

                $mg = "error transaction";
                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                    'success' => 0
                ], 200);

            }
            $bo = bo::where('refid', $request->refid)->first();;
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                    'success' => 0
                ], 200);

            } else {


                $gt = $wallet->balance - $request->amount;


                $wallet->balance = $gt;
                $wallet->save();
                $bo = bo::create([
                    'username' => $user->username,
                    'plan' => 'Airtime',
                    'amount' => $request->amount,
                    'server_res' => 'api use',
                    'result' => 1,
                    'phone' =>$request->number,
                    'refid' => "Api".$request->refid,
                ]);
                $bo['name']=$user->name;

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.honourworld.com.ng/api/v1/purchase/airtime',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => '{
  "network" : "'.$request->name.'",
  "phone" : "'.$request->number.'",
  "amount" : "'.$request->amount.'"
}',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer sk_live_9a55cd84-8ad7-46d9-9136-c5962858f753',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
//            echo $response;

                $data = json_decode($response, true);
//            $success = $data["message"];
//            $tran1 = $data["discountAmount"];

//                        return $response;
                if ($data['message']== 'SUCCESSFUL') {
                    $success=1;
                    $name = "Airtime";
                    $am = "NGN $request->amount  Airtime Purchase Was Successful To";
                    $ph = $request->number;

                    $receiver = $user->email;
                    $admin = 'admin@primedata.com.ng';
                    $admin2= 'primedata18@gmail.com';

                    Mail::to($receiver)->send(new Emailtrans($bo));
                    Mail::to($admin)->send(new Emailtrans($bo));
                    Mail::to($admin2)->send(new Emailtrans($bo));

                    return response()->json([
                        'message' => $am, 'ph'=>$ph, 'success'=>$success,
                        'user' => $user
                    ], 200);
                }  elseif ($data['message']== 'Possible duplicate transaction, Please retry after 2 minutes') {
                    $zo = $wallet->balance + $request->amount;
                    $wallet->balance = $zo;
                    $wallet->save();
                    $success=0;
                    $name = 'Airtime';
                    $am = "NGN $request->amount Was Refunded To Your Wallet";
                    $ph = ", Possible duplicate transaction, Please retry after 2 minutesl";


                    return response()->json([
                        'message' => $am,  'ph'=>$ph, 'success'=>$success,
                        'user' => $user
                    ], 200);

                }




            }
        }else {
            return response()->json([
                'message' => "User not found",
            ], 200);

        }
    }
    public static function error_processor($validator)
    {
        $err_keeper = [];
        foreach ($validator->errors()->getMessages() as $index => $error) {
            array_push($err_keeper, ['code' => $index, 'message' => $error[0]]);
        }
        return $err_keeper;
    }
}
