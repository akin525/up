<?php

namespace App\Http\Controllers;

use App\Models\bo;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController
{
    function viewpdf($request)
    {
        $tran=bo::where('id', $request)->first();
        return view('recepit', compact('tran'));
    }

    function dopdf($request)
    {
        $tran=bo::where('id', $request)->first();
        $pdf = PDF::loadView('recepit1', compact('tran'));
        return $pdf->download('receipt.pdf');
    }
}
