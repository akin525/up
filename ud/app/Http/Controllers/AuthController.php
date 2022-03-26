<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wallet;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;



class AuthController
{
    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $me = Messages::where('status', 1)->first();

            $wallet = wallet::where('username', $user->username)->get();
            $deposite = deposit::where('username', $request->user()->username)->get();
            $totaldeposite = 0;
            foreach ($deposite as $depo){
                $totaldeposite += $depo->amount;

            }
            $bil2 = bo::where('username', $request->user()->username)->get();
            $bill = 0;
            foreach ($bil2 as $bill1){
                $bill += $bill1->amount;

            }
            return  view('dashboard', compact('user', 'wallet', 'totaldeposite', 'me',  'bil2', 'bill'));
        }
    }
    public function buydata(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where('status',1 )->get();

            return view('buydata', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function pre(Request $request)


    {
        $request->validate([
            'id' => 'required',
        ]);
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where('id',$request->id )->get();

            return view('pre', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function airtime(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where('plan_id',"airtime" )->get();

            return view('airtime', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
