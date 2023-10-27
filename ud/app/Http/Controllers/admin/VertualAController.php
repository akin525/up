<?php

namespace app\Http\Controllers\admin;

use App\Mail\Emailpass;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class VertualAController
{
public function list()
{
    $vertual=wallet::get();
    $alluser = User::count();


    return view('admin/vertual', compact('vertual', 'alluser' ));

}
public function users()
{
    $users=User::get();

    return view('admin/users', compact('users' ));

}
public function edituser(Request $request)
{
    $users=User::where('id', $request->id)->first();

    return view('admin/edituser', compact('users' ));

}
public function updateuser(Request $request)
{
    $request->validate([
        'email' => 'required',
        'number' => 'required',
        'name' => 'required',
        'username' => 'required',
        'role' => 'required',
    ]);
    $users=User::where('username', $request->username)->first();
    $users->name=$request->name;
    $users->phone_no=$request->number;
    $users->email=$request->email;
    $users->role=$request->role;
    $users->save();

    return redirect(url('admin/profile/'.$users->username))
        ->with('status', $users->username.' was updated successfully');

}
public function pass(Request $request)
{
    $request->validate([
        'username' => 'required',
    ]);
    $users=User::where('username', $request->username)->first();
    $new= uniqid('pass', true);

    $users->password=$new;
    $users->save();
    $admin= 'admin@primedata.com.ng';
    $admin1= 'primedata18@gmail.com';

    $receiver= $users->email;
    Mail::to($receiver)->send(new Emailpass($new));
    Mail::to($admin)->send(new Emailpass($new ));
    Mail::to($admin1)->send(new Emailpass($new ));
    return redirect(url('admin/profile/'.$request->username))
        ->with('status', $users->username.' password was change successfully');

}
public function apikey(Request $request)
{
    $request->validate([
        'username' => 'required',
    ]);
    $users=User::where('username', $request->username)->first();
    $api= uniqid("PRIME", true);
    $users->apikey=$api;
    $users->save();
    return redirect(url('admin/profile/'.$request->username))
        ->with('status', $users->username.' New Api was Generated Successfully');
}
    public function regenerateaccount($request)
    {
        $user=User::where('username', $request)->first();
        $input=wallet::where('username', $user->username)->first();

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
   "firstname": "'.$user['name'].'",
        "lastname": "'.$user['username'].'",
        "address": "'.$user['address'].'",
        "gender": "'.$user['gender'].'",
        "email": "'.$user['email'].'",
        "phone": "'.$user['phone'].'",
        "dob": "'.$user['dob'].'",
        "provider": "gtb"
}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.env('PAYLONY')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);

        if ($data['success']=="true"){
            $account = $data["data"]["account_name"];
            $number = $data["data"]["account_number"];
            $bank = $data["data"]["provider"];
            $ref= $data['data']['reference'];

            $input->account_number = $number;
            $input->account_name = $account;
            $input->bank = $bank;
            $input->save();

            $user->ref=$ref;
            $user->save();
            Alert::success('Succeaa', 'Virtual Account Successful Created');
            return back();
        }else{

            Alert::error('Error', $response);
            return back();
        }

    }

    public function generateaccount($request)
    {
        $user=User::where('username', $request)->first();
        $input=wallet::where('username', $user->username)->first();

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
     "firstname": "'.$user['name'].'",
        "lastname": "'.$user['username'].'",
        "address": "'.$user['address'].'",
        "gender": "'.$user['gender'].'",
        "email": "'.$user['email'].'",
        "phone": "'.$user['phone'].'",
        "dob": "'.$user['dob'].'",
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

        if ($data['success']=="true"){
            $account = $data["data"]["account_name"];
            $number = $data["data"]["account_number"];
            $bank = $data["data"]["provider"];
            $ref= $data['data']['reference'];

            $input->account_number = $number;
            $input->account_name = $account;
            $input->bank = $bank;
            $input->save();

            $user->ref=$ref;
            $user->save();
            Alert::success('Succeaa', 'Virtual Account Successful Created');
            return back();


        }else{

            Alert::error('Error', $response);
            return back();
        }

    }
}
