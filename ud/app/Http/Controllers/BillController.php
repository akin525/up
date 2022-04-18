<?php
namespace App\Http\Controllers;
use App\Mail\Emailfund;
use App\Mail\Emailtrans;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;
use App\Models\profit;
use App\Models\server;
use App\Models\setting;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{

    public function bill(Request $request)
    {
        $request->validate([
            'productid' => 'required',
        ]);
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();




            if ($wallet->balance < $request->amount) {
                $mg = "You Cant Make Purchase Above" . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return view('bill', compact('user', 'mg'));

            }
            if ($request->amount < 0) {

                $mg = "error transaction";
                return view('bill', compact('user', 'mg'));

            }
            $bo = bo::where('refid', $request->id)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return view('bill', compact('user', 'mg'));

            } else {
                $user = User::find($request->user()->id);
                $bt = data::where("id", $request->productid)->first();
                $wallet = wallet::where('username', $user->username)->first();


                $gt = $wallet->balance - $request->amount;


                $wallet->balance = $gt;
                $wallet->save();

                $object = json_decode($bt);
                $object->number = $request->number;
                $json = json_encode($object);

                $daterserver = new DataserverController();
                $mcd = server::where('status', "1")->first();

                    if ($mcd->name == "honorworld") {
                        return "Honorwold";
                        $response = $daterserver->honourwordbill($object);
                    }else if ($mcd->name == "mcd") {
                        return "Mcd people";
                        $response = $daterserver->mcdbill($object);
                    }

//                    return;

                        // echo $response;

//return $response;
                        $data = json_decode($response, true);
                    $success = "";
                  if (isset($data['result'])){
                      $success=$data['result'];
                  }else{
                      $success=$data["success"];
                  }
//                    echo $success;

                        $po =$request->amount  - $bt->amount;

                        if ($success ==1){
                            $bo = bo::create([
                                'username' => $user->username,
                                'plan' => $bt->plan,
                                'amount' => $request->amount,
                                'server_res' => $response,
                                'result' => $success,
                                'phone' => $request->number,
                                'refid' => $request->id,
                            ]);

                            $profit = profit::create([
                                'username' => $user->username,
                                'plan' => $bt->plan,
                                'amount' => $po,
                            ]);

                            $name= $bt->plan;
                            $am= "$bt->plan  was successful delivered to";
                            $ph= $request->number;


                            $receiver=$user->email;
                            $admin= 'admin@primedata.com.ng';

                            Mail::to($receiver)->send(new Emailtrans($bo ));
                            Mail::to($admin)->send(new Emailtrans($bo ));
                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                        }elseif ($success==0){
                            $zo=$user->balance+$request->amount;
                            $user->balance = $zo;
                            $user->save();

                            $name= $bt->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";

                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));


                        }


                    }
                }
            }
}



