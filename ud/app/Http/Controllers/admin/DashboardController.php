<?php

namespace app\Http\Controllers\admin;

use App\Models\admin;
use App\Models\bo;
use App\Models\charp;
use App\Models\deposit;
use App\Models\Messages;
use App\Models\profit;
use App\Models\refer;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
public function dashboard(Request $request)
{
    if (Auth()->user()->role=="admin") {
        $user = User::where('role', 'admin')->first();
        $me = Messages::where('status', 1)->first();
        $refer = refer::get();
        $totalrefer = 0;
        foreach ($refer as $de) {
            $totalrefer += $de->amount;

        }
        $count = refer::count();
        $alluser = User::count();
        $profit = profit::get();
        $totalprofit = 0;
        foreach ($profit as $pro) {
            $totalprofit += $pro->amount;
        }
        $wallet = wallet::get();
        $totalwallet=0;
        foreach ($wallet as $wall) {
            $totalwallet += (int)$wall->balance;

        }
        $deposite = deposit::get();
        $totaldeposite = 0;
        foreach ($deposite as $depo) {
            $totaldeposite += (int)$depo->amount;

        }
    $charge=charp::get();
    $totalcharge= 0;
        foreach ($charge as $ch) {
            $totalcharge += (int)$ch->amount;

        }
        $bil2 = bo::paginate(10);
        $bill = 0;
        $lock=0;
        foreach ($bil2 as $bill1) {
            $bill += (int)$bill1->amount;
            $lock += (int)$bill1->discountamoun;

        }
        $resellerURL = 'https://app.mcd.5starcompany.com.ng/api/reseller/';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $resellerURL . 'me',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'balance'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//                                                        return $response;
        $data = json_decode($response, true);
        $success = $data["success"];
        $tran = $data["data"]["wallet"];
        $pa = $data["data"]["commission"];
        return view('admin/dashboard', compact('user', 'wallet', 'lock', 'totalcharge',  'tran', 'alluser', 'totaldeposite', 'totalwallet', 'deposite', 'me', 'bil2', 'bill', 'totalrefer', 'totalprofit',  'count'));

    }
    return redirect("admin/login")->with('status', 'You are not allowed to access');

}
public function mcdtran()
{
    if (Auth()->user()->role == "admin") {
        $resellerURL = 'https://app.mcd.5starcompany.com.ng/api/reseller/';


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $resellerURL . 'me',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'transactions'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//echo $response;
        $data = json_decode($response, true);
        $success = $data["data"];
        return view('admin/mcdtransaction', compact('success' ));

    }
    return redirect("admin/login")->with('status', 'You are not allowed to access');
}
}
