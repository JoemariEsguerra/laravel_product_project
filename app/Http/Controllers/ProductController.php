<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'integer',
            'product_description' => 'required',
        ]);

        $product = new ProductModel;
        $product->ProductName = $request->product_name;
        $product->ProductCode = $request->product_code;
        $product->Price = $request->product_price;
        $product->Description = $request->product_description;
        $product->IsActive = 1;

        if($product->save()){
            return redirect('/home')->with('success','Product created successfully.');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return view('products.show',[
        //     'id' => $id,
        //     'data' => ProductModel::where('Productid',$id)->first()
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('products.show',[
            'id' => $id,
            'data' => ProductModel::where('Productid',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product =  ProductModel::find($id);
        $product->ProductName = $request->product_name;
        $product->ProductCode = $request->product_code;
        $product->Price = $request->product_price;
        $product->Description = $request->product_description;
        $product->IsActive = $request->product_status;
        $product->save();

        return redirect('/home')->with('success', 'Record Successfully Updated!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ProductModel::where('ProductId',$id)->delete();
        return redirect('/home')->with('success','Record Successfully Delete!');
    }

    public function search(Request $request){
        $search  = ProductModel::where('ProductName','LIKE',"%{$request->search}%")
        ->orWhere('ProductCode','LIKE',"%{$request->search}%")
        ->orWhere('Description','LIKE',"%{$request->search}%")
        ->get();
        return view('home',['data' => $search]);
    }
}
