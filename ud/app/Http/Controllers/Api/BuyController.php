<?php

namespace App\Http\Controllers\Api;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wallet;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;



class BuyController
{
    public function buydata(Request  $request)
    {
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        if ($user) {
            $data = data::where('status',1 )->get();

            return response()->json([
                'message' => 'Data Fetch Successfully',
                'user' => $user, 'data' =>$data,
            ], 200);
        }

        return response()->json([
            'message' => 'You are not allowed to access'
        ], 200);
    }
    public function pre(Request $request)


    {
        $request->validate([
            'id' => 'required',
        ]);
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        if ($user) {
            $data = data::where('id',$request->id )->get();
            return response()->json([
                'message' => 'Data Fetch Successfully',
                'user' => $user, 'data' =>$data
            ], 200);
        }

        return response()->json([
            'message' => 'You are not allowed to access'
        ], 200);
    }
    public function airtime(Request  $request)
    {
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        if ($user) {
            $data = data::where('plan_id',"airtime" )->get();

            return response()->json([
                'message' => 'Data Fetch Successfully',
                'user' => $user, 'data' =>$data
            ], 200);
        }

        return response()->json([
            'message' => 'You are not allowed to access'
        ], 200);
    }
}
