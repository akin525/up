<?php

namespace App\Http\Controllers;

use App\Models\bill_payment;
use App\Models\bo;
use App\Models\charp;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController
{
    function yearly(Request $request)
    {
        if (!isset($request->date)) {
            $date = Carbon::now()->format("Y");
        } else {
            $date = Carbon::parse($request->date)->format("Y");
        }

        $data['data'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->count();
        $data['data_amount'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['airtime'] = bo::where([['plan', 'like', '%airtime%'], ['date', 'LIKE', $date . '%']])->count();
        $data['airtime_amount'] = bo::where([['plan', 'like', '%airtime%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['tv'] = bo::where([['plan', 'like', '%tv%'],  ['date', 'LIKE', $date . '%']])->count();
        $data['tv_amount'] = bo::where([['plan', 'like', '%tv%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['electricity'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->count();
        $data['electricity_amount'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->sum('amount');

        $data['te'] = 0;

        $data['date'] = $date;

        return view('admin/report_yearly', $data);
    }

    function monthly(Request $request)
    {
        if (!isset($request->date)) {
            $date = Carbon::now()->format("Y-m");
        } else {
            $date = Carbon::parse($request->date)->format("Y-m");
        }

        $data['data'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->count();
        $data['data_amount'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['airtime'] = bo::where([['plan', 'like', '%airtime%'],  ['date', 'LIKE', $date . '%']])->count();
        $data['airtime_amount'] = bo::where([['plan', 'like', '%airtime%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['tv'] = bo::where([['plan', 'like', '%tv%'], ['date', 'LIKE', $date . '%']])->count();
        $data['tv_amount'] = bo::where([['plan', 'like', '%tv%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['electricity'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->count();
        $data['electricity_amount'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->sum('amount');


        $data['te'] = 0;

        $data['date'] = $date;

        return view('admin/report_monthly', $data);
    }

    function daily(Request $request)
    {
        if (!isset($request->date)) {
            $date = Carbon::now()->format("Y-m-d");
        } else {
            $date = Carbon::parse($request->date)->format("Y-m-d");
        }

        $data['data'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->count();
        $data['data_amount'] = bo::where([['plan', 'like', '%GB%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['airtime'] = bo::where([['plan', 'like', '%airtime%'], ['date', 'LIKE', $date . '%']])->count();
        $data['airtime_amount'] = bo::where([['plan', 'like', '%airtime%'],  ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['tv'] = bo::where([['plan', 'like', '%tv%'], ['date', 'LIKE', $date . '%']])->count();
        $data['tv_amount'] = bo::where([['plan', 'like', '%tv%'], ['date', 'LIKE', $date . '%']])->sum('amount');
        $data['electricity'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->count();
        $data['electricity_amount'] = bo::where([['plan', 'like', '%electricity%'], ['date', 'LIKE', $date . '%']])->sum('amount');


        $data['te'] = 0;

        $data['date'] = $date;

        return view('admin/report_daily', $data);
    }
}
