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
        <label for="desciption">desciption</label>
        <input type="text" class="form-control" name="desciption" id="desciption" placeholder="Enter desciption" value="{{$info['desciption']}}">
</div>
  <div class="mb-3">
            <button class="btn btn-success">Save</button>
 </div>
</form>
</div>  
@endsection