@extends('layouts.my')
@section('content')
 <div class="container border">
<form action="/product/{{$info['id']}}" method="post">
@csrf
@method('put')
<div class="mb-3">
  <label for="product_name">Product Name</label>
  <input type="text" class="form-control" name="product_name" id="product_name" required placeholder="Enter Product Name" value="{{$info['product_name']}}">
  </div>
  <div class="mb-3">
      <label for="product_price">Product Price</label>
      <input type="number" class="form-control" name="product_price" id="product_price" required placeholder="Enter Product Price" value="{{$info['product_price']}}">
  </div>
  <div class="mb-3">
    <label for="discount">discount</label>
    <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter discount" value="{{$info['discount']}}">
  </div>
  <div class="mb-3">
    <label for="quantity">quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity" required placeholder="Enter Quantity" value="{{$info['quantity']}}">
  </div>
  <div class="mb-3">
    <label for="mfd">M.F.D</label>
    <input type="date" class="form-control" name="mfd" id="mfd" placeholder="Enter M.F.D" value="{{$info['mfd']}}">
  </div>
    <div class="mb-3">
              <button class="btn btn-success">Save</button>
   </div>
  
</form>
</div>  
@endsection