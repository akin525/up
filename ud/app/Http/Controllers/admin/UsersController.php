<?php

namespace app\Http\Controllers\admin;

use App\Models\bo;
use App\Models\deposit;
use App\Models\refer;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController
{
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
            ->limit(100)
            ->get();

        $cquery = User::Where('username', 'LIKE', "%$user_name%")
            ->Where('phone_no', 'LIKE', "%$phoneno%")
            ->Where('email', 'LIKE', "%$email%")
            ->Where('created_at', 'LIKE', "%$regdate%")
            ->count();

        return view('admin/finds', ['users' => $query, 'count'=>$cquery, 'result'=>true]);
    }
    public function profile($user)
    {
        $ap = User::where('username', $user)->first();

        if(!$ap){
            return redirect('admin/finds')->with("error", "User does not exist");
        }
$wallet=wallet::where('username', $user)->first();
        $user =User::where('username', $user)->first();
        $tt = deposit::where('username', $user)->count();
        $td = deposit::where('username', $user)->orderBy('id', 'desc')->paginate(25);
        $v = DB::table('bos')->where('username', $user)->orderBy('id', 'desc')->get();
       $referrals = refer::where('username', $user)->get();
        $tat = bo::where('username', $user)->count();
//return $v;
        return view('admin/profile', ['user' => $ap, 'tt' => $tt, 'wallet'=>$wallet, 'td' => $td,  'referrals' => $referrals, 'version' => $v,  'tat' =>$tat]);
    }
}
