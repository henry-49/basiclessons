<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PagesController extends Controller
{
    //
    public function home()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        //$products = DB::table('products')->get();
        $products = Product::orderBy('product_name', 'asc')->paginate(2);
        return view('pages.services', compact('products'));
    }

    public function show($id)
    {
        // $product = DB::table('products')->where('id', $id)->first();
        $product = Product::find($id);

        return view('pages.show', compact('product'));

    }

    public function create()
    {
        return view('pages.create');
    }

    public function saveproduct(Request $request)
    {

       /*  $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_description'] = $request->product_description; */

        $this->validate($request,[
                                'product_name' => 'required',
                                'product_price' => 'required',
                                'product_description' => 'required'
                            ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->save();

       /*  if (!empty($data)){
            DB::table('products')->insert($data);
        } */

        Session::put('success', 'product added successfully');

        return redirect('/create');
    }

    public function editproduct($id) {

        $product = Product::find($id);

        return view('pages.edit', compact('product'));
    }

    public function updateproduct(Request $request)
    {

        /*  $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_description'] = $request->product_description; */

        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required'
        ]);

        $product = Product::find($request->input('id'));
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->update();

        /*  if (!empty($data)){
            DB::table('products')->insert($data);
        } */

        Session::put('success', 'product updated successfully');

        return redirect('/services');
    }

    public function deleteproduct($id) {

        $product = Product::find($id);

        $product->delete();

        Session::put('success', 'product deleted successfully');

        return redirect('/services');
    }

}