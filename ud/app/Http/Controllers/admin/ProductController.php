<?php

namespace app\Http\Controllers\admin;

use App\Models\data;
use Illuminate\Http\Request;

class ProductController
{
public function index()
{
    $product=data::paginate(50);

    return view('admin/product', compact('product'));
}
public function on(Request $request)
{
    $product = data::where('id', $request->id)->first();

    if ($product->status == "1") {
        $give = "0";
    } else {
        $give = "1";
    }
    $product->status = $give;
    $product->save();

    return redirect('admin/product')->with('success', 'Product update successfully');

}
public function in(Request $request)
{

    $pro=data::where('id', $request->id)->first();

return view('admin/editproduct', compact('pro'));
}
public function edit(Request $request)
{
    $request->validate([
        'id' => 'required',
        'amount' => 'required',
        'tamount' => 'required',
        'ramount' => 'required',
        'name' => 'required',
    ]);
    $pro=data::where('id', $request->id)->first();
    $pro->plan=$request->name;
    $pro->amount=$request->amount;
    $pro->tamount=$request->tamount;
    $pro->ramount=$request->ramount;
    $pro->save();
    return redirect('admin/product')->with('success', 'Product update successfully');

}

}
