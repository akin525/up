<?php

namespace app\Http\Controllers\admin;

use App\Mail\Emailcharges;
use App\Mail\Emailfund;
use App\Models\charp;
use App\Models\deposit;
use App\Models\setting;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CandCController
{
    public function cr()
    {
        if (Auth()->user()->role == "admin") {

            $wallet = wallet::get();
            $totalwallet = 0;
            foreach ($wallet as $wall) {
                $totalwallet += (int)$wall->balance;

            }
            return view('admin/credit', compact('totalwallet'));
        }
        return redirect("admin/login")->with('status', 'You are not allowed to access');


    }
public function credit(Request $request)
{
    $request->validate([
        'username' => 'required',
        'amount' => 'required',
        'refid' => 'required',
    ]);
    if (Auth()->user()->role == "admin") {


        $user = User::where('username', $request->username)->first();
        if (!isset($user)){
            return redirect("admin/credit")->with('error','Username not found');

        }
        $wallet = wallet::where('username', $request->username)->first();

        $depo = deposit::where('payment_ref', $request->refid)->first();
        if (isset($depo)) {
            return redirect("admin/credit")->with('error','Duplicate Transaction');

        } else {
            $gt = $wallet->balance + $request->amount;
            $deposit = deposit::create([
                'username' => $user->username,
                'payment_ref' => $request->refid,
                'amount' => $request->amount,
                'iwallet' => $wallet->balance,
                'fwallet' => $gt,
            ]);

            $wallet->balance = $gt;
            $wallet->save();
            $admin = 'admin@primedata.com.ng';
            $admin2 = 'primedata18@gmail.com';

            $receiver = $user->email;
            Mail::to($receiver)->send(new Emailfund($deposit));
            Mail::to($admin)->send(new Emailfund($deposit));
            Mail::to($admin2)->send(new Emailfund($deposit));

            return redirect(route('admin/credit'))
                ->with('status', $request->amount . " was credited to " . $user->username . ' successfully');

        }
    }
    return redirect("admin/login")->with('status', 'You are not allowed to access');


}
public function sp()
{
    $ch=charp::get();
    return view('admin/charge', compact('ch'));

}
public function charge(Request $request)
{
    $request->validate([
        'username' => 'required',
        'amount' => 'required',
        'refid' => 'required',
    ]);
    if (Auth()->user()->role == "admin") {
        $user = User::where('username', $request->username)->first();
        if (!isset($user)){
            return redirect("admin/charge")->with('error','Username not found');

        }
        $wallet = wallet::where('username', $request->username)->first();


        $gt = $wallet->balance - $request->amount;
        $charp = charp::create([
            'username' => $user->username,
            'payment_ref' => $request->refid,
            'amount' => $request->amount,
            'iwallet' => $wallet->balance,
            'fwallet' => $gt,
        ]);

        $wallet->balance = $gt;
        $wallet->save();


        $admin = 'admin@primedata.com.ng';
        $admin2 = 'primedata18@gmail.com';

        $receiver = $user->email;
        Mail::to($receiver)->send(new Emailcharges($charp));
        Mail::to($admin)->send(new Emailcharges($charp));
        Mail::to($admin2)->send(new Emailcharges($charp));

        return redirect(route('admin/charge'))
            ->with('status', $request->amount . " was charge from " . $user->username . ' wallet successfully');

    }
    return redirect("admin/login")->with('status', 'You are not allowed to access');

}

}
