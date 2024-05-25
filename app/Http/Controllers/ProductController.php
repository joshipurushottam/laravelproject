<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\ProductCategory;

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
        return view ('product.index',['data'=>product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cdata=category::all(['id','name']);
        return view('product.create',compact('cdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'name'=> "required|min:3|max:40",
        //     'price'=> "required|numeric|min:50",
        //    ]);
            $info=[
                'product_name'=>$request->product_name,
                'product_price'=>$request->product_price,
                'discount'=>$request->discount,
                'mfd'=>$request->mfd,
                'quantity'=>$request->quantity,
            ];
    
        $obj=Product::create($info);
        // if(count($request->category_id)>0){
        //     foreach($request->category_id as $cid){
        //         $pcinfo=[
        //             'category_id'=>$cid,
        //             'product_id'=>$obj->id
        //         ];
        //        CategoryProduct::create($pcinfo);
        //     }
        // }
        return redirect('/product')->with('grt','Data Saved Successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit',['info'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->quantity=$request->quantity;
        $product->mfd=$request->mfd;
        $product->discount=$request->discount;
        $product->Save();
        return redirect('/product')->with('grt','Data Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect('/product')->with('grt','Data Deleted Successfully');
    }
}