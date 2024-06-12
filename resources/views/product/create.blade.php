@extends('layouts.my')
@section('content')
<style>
  .dgrid{
    border:1px solid  #ddd;
    padding: 5px;
    display: grid;
    grid-template-columns:  1fr 1fr 1fr 1fr;la
  }
  
</style>


 <div class="container border">
  @foreach($errors->all() as $e)
  <div class="alert alert-danger">{{$e}}</div>
  @endforeach
<form action="/product/" method="post" enctype="multipart/form-data">
@csrf

<div class="mb-3" id="div">
<label for="product_name">Select Category:</label>
<div class="dgrid">
  @foreach($cdata as $pinfo)
<div>
  <input type="checkbox" id="{{$pinfo['id']}}" name="category_id[]" value="{{$pinfo['id']}}">
  <label for="{{$pinfo['id']}}">
  {{$pinfo['name']}}
</label>
</div>
  @endforeach
</div>
</div>


<div class="mb-3">
  <label for="product_name">Product Name</label>
  <input type="text" class="form-control" name="product_name" id="product_name" required placeholder="Enter Product Name">
</div>


  <div class="mb-3">
    <label for="product_price">Price</label>
    <input type="text" class="form-control" name="product_price" id="product_price" required placeholder="Enter Price">
  </div>


    <div class="mb-3">
      <label for="discount">Discount</label>
      <input type="text" class="form-control" name="discount" id="discount" required placeholder="Enter Discount">
    </div>
      

      <div class="mb-3">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" name="quantity" id="quantity" required placeholder="Enter Quantity">
      </div>

      <div class="mb-3">
        <label for="mfd">Mfd</label>
        <input type="date" class="form-control" name="mfd" id="mfd" required placeholder="Enter Mfd">
      </div>
     
      <div class="mb-3">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo[]" multiple id="photo" accept="image/jpeg">
      </div>

  <div class="mb-3">
            <button class="btn btn-success">Save</button>
 </div>
</form>
</div>  
@endsection