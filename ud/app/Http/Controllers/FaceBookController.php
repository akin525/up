<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'username'=>$user->getName().rand(111, 999),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' =>$user->getName().'@'.$user->getId()
            ]);
            $wallet= wallet::create([
                'username'=>$saveUser['username'],
                'balance' => 0,
            ]);
            Auth::loginUsingId($saveUser->id);

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
