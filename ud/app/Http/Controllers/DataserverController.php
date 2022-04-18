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
class DataserverController extends Controller
{

    public function honourwordbill($request)
    {


                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://honourworld.ng/datatopup',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('action' => 'data-topup', 'category_id' => $request->cat_id, 'plan_id' => $request->plan_id, 'contact_opt' => '2', 'phone_num' => $request->number),
                            CURLOPT_HTTPHEADER => array(
                                'Cookie: PHPSESSID=be3030e3b1a0cb40c0b2c5903d05fdf6; lang=en-US; nplh=4915.13266a73e5010cb60ede277741fdb032; nplrmm=1'
                            ),
                        ));
                        $response = curl_exec($curl);

                        curl_close($curl);
                        // echo $response;

                    return $response;

            }

    public function mcdbill( $request)
    {

        $resellerURL = 'https://app.mcd.5starcompany.com.ng/api/reseller/';
        $curl = curl_init();

                     curl_setopt_array($curl, array(
                      CURLOPT_URL => $resellerURL.'pay',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('service' => 'data','coded' => $request->code,'phone' => $request->number),

                         CURLOPT_HTTPHEADER => array(
                             'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
                         )));


        $response = curl_exec($curl);

                curl_close($curl);
//                echo $response;


                return $response;

            }
}



