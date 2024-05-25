@extends('layouts.my')
@section('content')
 <div class="container border">
<form action="/category/{{$info['id']}}/edit" method="post">
@csrf
@method('put')
<div class="mb-3">
<label for="name">Category Name</label>
<input type="text" class="form-control" name="name" id="name" required placeholder="Enter Category Name" value="{{$info['name']}}">
</div>
<div class="mb-3">
    <label for="price">Category Price</label>
    <input type="number" class="form-control" name="price" id="price" required placeholder="Enter Category Price" value="{{$info['price']}}">
</div>
<div class="mb-3">
        <label for="discount">discount</label>
        <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter discount" value="{{$info['discount']}}">
</div>
  <div class="mb-3">
            <button class="btn btn-success">Save</button>
 </div>
</form>
</div>  
@endsection