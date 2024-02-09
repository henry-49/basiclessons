<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = DB::table('products')->get();
        $products = Product::orderBy('product_name', 'asc')->paginate(2);
        return view('products.services', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*  $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_description'] = $request->product_description; */

        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_image' => 'image|nullable|max:1999',
        ]);

        $fileExtName = $request->file('product_image')->getClientOriginalName();

        $filename = pathinfo($fileExtName, PATHINFO_FILENAME);

        $fileExt = $request->file('product_image')->getClientOriginalExtension();

        $fileNameToStore = $filename.'_'.time().'.'.$fileExt;

       // dd($fileExtName, $filename, $fileExt, $fileNameToStore);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->save();

        /*  if (!empty($data)){
            DB::table('products')->insert($data);
        } */

        Session::put('success', 'product added successfully');

        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $product = DB::table('products')->where('id', $id)->first();
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->update();

        /*  if (!empty($data)){
            DB::table('products')->insert($data);
        } */

        Session::put('success', 'product updated successfully');

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::put('success', 'product deleted successfully');

        return redirect('/products');
    }
}