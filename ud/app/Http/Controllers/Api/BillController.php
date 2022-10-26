<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\DataserverController;
use App\Mail\Emailtrans;
use App\Models\big;
use App\Models\bo;
use App\Models\data;
use App\Models\profit;
use App\Models\server;
use App\Models\wallet;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;
use Mockery\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class BillController
{

    public function data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'amount' => 'required',
            'number' => 'required',
            'refid' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $this->error_processor($validator)
            ], 403);
        }
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        $serve = server::where('status', '1')->first();
        return $serve;
        if ($serve->name == 'honorworld') {
            $bt = big::where('id', $request->code)->first();
        } elseif ($serve->name == 'mcd') {
            $bt = data::where('id', $request->code)->first();
        }

        return $bt;
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
            $bo = bo::where('refid', 'api'.$request->refid)->first();;
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return response()->json([
                    'message' => $mg,
                    'user' => $user,
                    'success' => 0
                ], 200);

            } else {
                if (!isset($bt)) {
                    return response()->json([
                        'message' => "invalid code, check and try again later",
                        'user' => $user,
                        'success' => 0
                    ], 200);
                }
                $gt = $wallet->balance - $bt->ramount;


                $wallet->balance = $gt;
                $wallet->save();

                $daterserver = new DataserverController();

                $object = json_decode($bt);
                $object->number = $request->number;
                $json = json_encode($object);

                $mcd = server::where('status', "1")->first();
                if ($mcd->name == "honorworld") {
                    $response = $daterserver->honourwordbill($object);
                    $data = json_decode($response, true);

//                    return $response;
                    if ($data['code'] == '200') {
                        $success = 1;
                        $ms = $data['message'];

//                    echo $success;

                        $po = $bt->ramount - $bt->amount;

                        $bo = bo::create([
                            'username' => $user->username,
                            'plan' => $bt->network . '|' . $bt->plan,
                            'amount' => $request->amount,
                            'server_res' => $response,
                            'result' => $success,
                            'phone' => $request->number,
                            'refid' => 'api' . $request->refid,
                        ]);

                        $profit = profit::create([
                            'username' => $user->username,
                            'plan' => $bt->network . '|' . $bt->plan,
                            'amount' => $po,
                        ]);

                        $name = $bt->plan;
                        $am = "$bt->plan  was successful delivered to";
                        $ph = $request->number;


                        $receiver = $user->email;
                        $admin = 'admin@primedata.com.ng';
                        $admin2 = 'primedata18@gmail.com';

                        Mail::to($receiver)->send(new Emailtrans($bo));
                        Mail::to($admin)->send(new Emailtrans($bo));
                        Mail::to($admin2)->send(new Emailtrans($bo));
                        return response()->json([
                            'success' => $success,  'message' => $am, 'name' => $name, 'ph' => $ph,
                            'user' => $user
                        ], 200);
                    }elseif ($data['code'] == '300') {
                        $success = 0;
                        $zo = $wallet->balance + $bt->ramount;
                        $wallet->balance = $zo;
                        $wallet->save();

                        $name = $bt->plan;
                        $am = "NGN $request->amount Was Refunded To Your Wallet";
                        $ph = ", Transaction fail";
                        return response()->json([
                            'success' => $success,  'message' => $am, 'name' => $name, 'ph' => $ph,
                            'user' => $user
                        ], 200);

                    }

                }else if ($mcd->name == "mcd") {
                    $response = $daterserver->mcdbill($object);
                    $data = json_decode($response, true);

                    if (isset($data['success'])) {

//                    echo $success;
                        $success = "1";
                        $po = $bt->ramount - $bt->amount;

                        $bo = bo::create([
                            'username' => $user->username,
                            'plan' => $bt->network . '|' . $bt->plan,
                            'amount' => $request->amount,
                            'server_res' => $response,
                            'result' => $success,
                            'phone' => $request->number,
                            'refid' =>'api'. $request->refid,
                        ]);

                        $profit = profit::create([
                            'username' => $user->username,
                            'plan' => $bt->network . '|' . $bt->plan,
                            'amount' => $po,
                        ]);

                        $name = $bt->plan;
                        $am = "$bt->plan  was successful delivered to";
                        $ph = $request->number;


                        $receiver = $user->email;
                        $admin = 'admin@primedata.com.ng';
                        $admin2 = 'primedata18@gmail.com';

                        Mail::to($receiver)->send(new Emailtrans($bo));
                        Mail::to($admin)->send(new Emailtrans($bo));
                        Mail::to($admin2)->send(new Emailtrans($bo));

                        return response()->json([
                            'success' => $success,  'message' => $am, 'name' => $name, 'ph' => $ph,
                            'user' => $user
                        ], 200);

                    }elseif (!isset($data['success'])) {
                        $success = 0;
                        $zo = $wallet->balance + $request->amount;
                        $wallet->balance = $zo;
                        $wallet->save();

                        $name = $bt->plan;
                        $am = "NGN $request->amount Was Refunded To Your Wallet";
                        $ph = ", Transaction fail";
                        return response()->json([
                            'success' => $success,  'message' => $am, 'name' => $name, 'ph' => $ph,
                            'user' => $user
                        ], 200);
                    }

                }
                // echo $response;


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



