<?php

namespace App\Http\Controllers;
use App\Mail\Emailcharges;
use App\Mail\Emailfund;
use App\Models\bo;
use App\Models\charp;
use App\Models\data;
use App\Models\deposit;
use App\Models\setting;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class VertualController
{
    public function vertual(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();

            if ($user->address == null || $user->dob == null || $user->gender == null){
                $msg="Kindly update your address, gender, date of birth before clicking generate virtual account";
                Alert::warning('Ooops..', $msg);
                return back();
            }
            $input=$user;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://app.paylony.com/api/v1/create_account',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
    "firstname": "'.$input['name'].'",
        "lastname": "'.$input['username'].'",
        "address": "'.$input['address'].'",
        "gender": "'.$input['gender'].'",
        "email": "'.$input['email'].'",
        "phone": "'.$input['phone_no'].'",
        "dob": "'.$input['dob'].'",
        "provider": "providus"
}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.env('PAYLONY')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $data = json_decode($response, true);
            if ($data['success']=="true") {
                $account = $data["data"]["account_name"];
                $number = $data["data"]["account_number"];
                $bank = $data["data"]["provider"];
                $ref= $data['data']['reference'];

                $wallet->account_number = $number;
                $wallet->account_name = $account;
                $wallet->bank=$bank;
                $wallet->save();

                $user->ref=$ref;
                $user->save();

                return redirect("dashboard")->withSuccess('You are not allowed to access');
            }elseif ($data['success']==0){

                Alert::error('Error', $response);
                return redirect('dashboard');
            }

        }
    }
    public function run(Request $request)
    {
        //     if ($json = json_decode(file_get_contents("php://input"), true)) {
        //         print_r($json['ref']);
        // print_r($json['accountDetails']['accountName']);
        //         $data = $json;

        //     }
//$paid=$data["paymentStatus"];
        $refid=$request["ref"];
        $amount=$request["amount"];
        $no=$request["account_number"];
//  echo $amount;
// echo $bank;
//echo $acct;

        $wallet = wallet::where('account_number', $no)->first();
        $pt=$wallet->balance;

        if ($no == $wallet->account_number) {
            $depo = deposit::where('payment_ref', $refid)->first();
            $user = user::where('username', $wallet->username)->first();
            if (isset($depo)) {
                echo "payment refid the same";
            }else {

                $char = setting::first();
                $amount1 = $amount - $char->charges;


                $gt = $amount1 + $pt;
                $reference=$refid;

                $deposit = deposit::create([
                    'username' => $wallet->username,
                    'payment_ref' => $reference,
                    'amount' => $amount,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $charp = charp::create([
                    'username' => $wallet->username,
                    'payment_ref' => $reference,
                    'amount' => $char->charges,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);


                $admin= 'admin@primedata.com.ng';

                $receiver= $user->email;
                Mail::to($receiver)->send(new Emailcharges($charp ));
                Mail::to($admin)->send(new Emailcharges($charp ));

                $wallet->balance = $gt;
                $wallet->save();
                $user = user::where('username', $wallet->username)->first();

                $receiver = $user->email;
                Mail::to($receiver)->send(new Emailfund($deposit));

            }


        }
    }

}
