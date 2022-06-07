<?php

namespace app\Http\Controllers\admin;

use App\Models\bo;
use App\Models\charp;
use App\Models\deposit;
use App\Models\refer;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController
{
    public function index(Request $request)
    {
$u=User::get();
        $users =DB::table('users')
            ->join('wallets','users.username','=','users.username')
            ->get();
        $wallet = DB::table('wallets')->orderBy('id', 'desc')->get();

        $t_users = DB::table('users')->count();
        $f_users = DB::table('users')->where("role","=","")->count();

        $r_users = DB::table('refers')->where("username","!=","")->count();

        $a_users = DB::table('users')->where("role","=","users")->count();

//return $users;
        return view('admin/users', ['users' => $users, 't_users'=>$t_users, 'wallet'=>$wallet, 'f_users'=>$f_users, 'r_users'=>$r_users,'a_users'=>$a_users]);

    }
    public function fin()
    {
        $user=User::get();
        return view('admin/finds', compact('user'));

    }
    public function finduser(Request $request){
        $input = $request->all();
        $user_name=$input['user_name'];
        $phoneno=$input['phoneno'];
        $status=$input['status'];
        $wallet=$input['wallet'];
        $email=$input['email'];
        $regdate=$input['regdate'];

        // Instantiates a Query object
        $query = User::Where('username', 'LIKE', "%$user_name%")
            ->Where('phone_no', 'LIKE', "%$phoneno%")
            ->Where('email', 'LIKE', "%$email%")
            ->Where('created_at', 'LIKE', "%$regdate%")
            ->limit(500)
            ->get();

        $cquery = User::Where('username', 'LIKE', "%$user_name%")
            ->Where('phone_no', 'LIKE', "%$phoneno%")
            ->Where('email', 'LIKE', "%$email%")
            ->Where('created_at', 'LIKE', "%$regdate%")
            ->count();

        return view('admin/finds', ['users' => $query, 'count'=>$cquery, 'result'=>true]);
    }
    public function profile($username)
    {
        $ap = User::where('username', $username)->first();

        if(!$ap){
            return redirect('admin/finds')->with("error", "User does not exist");
        }
$wallet=wallet::where('username', $username)->first();
        $user =User::where('username', $username)->first();
        $sumtt = deposit::where('username', $ap->username)->sum('amount');
        $tt = deposit::where('username', $ap->username)->count();
        $td = deposit::where('username', $ap->username)->paginate(10);
        $v = DB::table('bos')->where('username', $ap->username)->orderBy('id', 'desc')->paginate(25);
       $referrals = refer::where('username', $ap->usernamer)->get();
        $tat = bo::where('username', $ap->username)->count();
        $sumbo = bo::where('username', $ap->username)->sum('amount');
        $sumch = charp::where('username', $ap->username)->sum('amount');
        $charge = charp::where('username', $ap->username)->paginate(10);
//return $user;
        return view('admin/profile', ['user' => $ap, 'sumtt'=>$sumtt, 'charge'=>$charge,  'sumch'=>$sumch, 'sumbo'=>$sumbo, 'tt' => $tt, 'wallet'=>$wallet, 'td' => $td,  'referrals' => $referrals, 'version' => $v,  'tat' =>$tat]);
    }
}
