@extends('layouts.my')
@section('content')
 <div class="container border">
<form action="/category/{{$info['id']}}" method="post">
@csrf
@method('put')
<div class="mb-3">
<label for="name">Category Name</label>
<input type="text" class="form-control" name="name" id="name" required placeholder="Enter Category Name" value="{{$info['name']}}">
</div>
<div class="mb-3">
        <label for="description">description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="{{$info['description']}}">
</div>
  <div class="mb-3">
            <button class="btn btn-success">Save</button>
 </div>
</form>
</div>  
@endsection