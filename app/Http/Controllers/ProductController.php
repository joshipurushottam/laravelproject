<?php

namespace App\Http\Controllers;


use App\Models\product;
use App\Models\category;
use App\Models\ProductMedia;
use App\Models\CategoryProduct;
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
        return view("product.index",['data'=>product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cdata=category::all(['id', 'name']);
           return view("product.create",compact('cdata'));
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
        
        // $request->validate([
        //     'name'=> "required|min:3|max:40",
        //     'price'=> "required|numeric|min:50",
        //     'photo'=> "required|file|image|mimes:jpeg,jpg|max:2048"
        //    ]);
        
        $info=[
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'Category'=>$request->Category,
            'mfd'=>$request->mfd,
            'quantity'=>$request->quantity,
            'discount'=>$request->discount,
            'After Discount'=>$request->AfterDiscount,
           
        ];
    
        $obj=Product::create($info);
        foreach($request->photo as $imagee)
        {
            $filename=[];
            $imagename= $imagee->getClientOriginalName();
            //$imagee->move(public_path('photo'),$imagename);
            //$filename[]= $imagename;
        
 
                 $isave=[
                         'product_id'=>$obj->id,
                         'image'=>$imagename,
                 ];
        ProductMedia::create($isave);
     }     



        if(count($request->category_id)>0){
            foreach($request->category_id as $cid){
                $pcinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
               CategoryProduct::create($pcinfo);
            }
        }
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
       $category=array_column( $product->allcategory->toArray(),'category_id');
       
        return view('product.edit',['info'=>$product,'cdata'=>category::all(['id','name']),'category'=>$category]);
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
        $product->find($product->{'id'})->delete();
        return redirect('/product')->with('grt','Data Deleted Successfully');
    }
    
    public function imageDelete($id)
    {
        $img= productmedia::find($id);
        unlink("photos/".$img['image']);
        $img->delete();

    }
}