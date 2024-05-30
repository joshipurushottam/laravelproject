@extends('layouts.my')
@section('content')
 <div class="container border">
  @foreach($errors->all() as $e)
  <div class="alert alert-danger">{{$e}}</div>
  @endforeach
<form action="/category/" method="post">
@csrf
<div class="mb-3">
<label for="name">Category Name</label>
<input type="text" class="form-control" name="name" id="name" required placeholder="Enter Category Name">
</div>
<div class="mb-3">
    <label for="description">Category description</label>
    <input type="text" class="form-control" name="description" id="description" required placeholder="Enter description">
</div>

  <div class="mb-3">
            <button class="btn btn-success">Save</button>
 </div>
</form>
</div>  
@endsection