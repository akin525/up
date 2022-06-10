<?php

namespace app\Http\Controllers\admin;

use App\Models\deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController
{
public function index()
{
    $all=deposit::paginate(50);

    return view('admin/finddeposite', compact('all'));
}
    public function finduser(Request $request)
    {
        $input = $request->all();
        $user_name = $input['user_name'];
        $phoneno = $input['phoneno'];
        $reference = $input['reference'];
        $amount = $input['amount'];
        $date = $input['date'];

        // Instantiates a Query object
        $query = deposit::Where('username',  "%$user_name%")
            ->orWhere('payment_ref',  "%$reference%")
            ->orWhere('amount', "$amount")
            ->orWhere('date',  "%$date%")
            ->OrderBy('id', 'desc')
            ->limit(1000)
            ->get();
        if(!$query){
            return redirect('admin/finddeposite')->with("error", "details does not exist");
        }
        $cquery = deposit::Where('username',  "%$user_name%")
            ->orWhere('payment_ref',  "%$reference%")
            ->orWhere('amount', "$amount")
            ->orWhere('date',  "%$date%")
            ->count();

        return view('admin/finddeposite', ['datas' => $query, 'count' => $cquery, 'result' => true]);
    }
    public function in(Request $request)
    {

        $data =deposit::orderBy('id', 'desc')->paginate(25);
        $tt = deposit::count();
        $ft = deposit::where([['date', 'like', Carbon::now()->format('Y-m-d') . '%']])->count();
        $st = deposit::where([['date', 'like', Carbon::now()->subDay()->format('Y-m-d') . '%']])->count();
        $rt = deposit::where([['date', 'like', Carbon::now()->subDays(2)->format('Y-m-d') . '%']])->count();



        return view('admin/deposits', ['data' => $data, 'tt' => $tt, 'ft' => $ft, 'st' => $st, 'rt' => $rt]);

    }


}
