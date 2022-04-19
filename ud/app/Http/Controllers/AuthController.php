<?php

namespace App\Http\Controllers;

use App\Models\charp;
use App\Models\Messages;
use App\Models\refer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wallet;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;



class AuthController
{
    public function customLogin(Request $request)
    {
        if (Auth()->user()){
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');

        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if(!isset($user)){
            return redirect()->back()->withInput($request->only('email', 'remember'))
                ->withErrors(['password' => 'Credentials does not match.']);
        }

        Auth::login($user);

        return redirect()->intended('dashboard')
            ->withSuccess('Signed in');


    }
    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $me = Messages::where('status', 1)->first();
            $refer = refer::where('username', $request->user()->username)->get();
            $totalrefer = 0;
            foreach ($refer as $de){
                $totalrefer += $de->amount;

            }
            $count = refer::where('username',$request->user()->username)->count();

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
            return  view('dashboard', compact('user', 'wallet', 'totaldeposite', 'me',  'bil2', 'bill', 'totalrefer', 'count'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }
    public function refer(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $refer = refer::where('username', $user->username)->first();

            $refers = refer::where('username', $request->user()->username)->get();
            $totalrefer = 0;
            foreach ($refers as $depo){
                $totalrefer+= $depo->amount;

            }

            return  view('referal', compact('user', 'refers', 'refer', 'totalrefer'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }
    public function select(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);


            return view('select', compact('user'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function select1(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);


            return view('select', compact('user'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function buydata(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where(['status'=> 1 ])->where('network', $request->id)->get();


            return view('buydata', compact('user', 'data'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function redata(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $data = data::where(['status'=> 1 ])->where('network', $request->id)->get();


            return view('redata', compact('user', 'data'));
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
            $wallet = wallet::where('username', $user->username)->first();

            return view('airtime', compact('user', 'data', 'wallet'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function invoice(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = bo::where('username', $request->user()->username)->get();


            return view('invoice', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function charges(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = charp::where('username', $request->user()->username)->get();


            return view('charges', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
