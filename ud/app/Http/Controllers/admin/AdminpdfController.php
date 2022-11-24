<?php

namespace App\Http\Controllers\admin;

use App\Models\bo;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminpdfController
{
    function viewpdf($request)
    {
        $tran=bo::where('id', $request)->first();
        return view('admin/recepit', compact('tran'));
    }

    function dopdf($request)
    {
        $tran=bo::where('id', $request)->first();
        $pdf = PDF::loadView('admin/recepit1', compact('tran'));
        return $pdf->download('receipt.pdf');
    }

}
