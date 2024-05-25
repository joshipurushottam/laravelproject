@extends('layouts.my')
@section('content')
    

<div class="container">
    @if($gt=Session::get('grt'))
    <div class="alert alert-success text-center">
        {{$gt}}
    </div>
    @endif
    @if($gt=Session::get('err'))
    <div class="alert alert-danger text-center">{{$gt}}</div>
    @endif
    <a href="/category/create" class="btn btn-primary">New Category</a>
    <table class="table table-striped">
     <thead>
           <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th>Price</th>
              <th>Discount</th>
              <th>After Discount</th>
              <th>Edit</th>
              <th>Delete</th>
              
           </tr>
     </thead>
     <tbody>
           @foreach ($data as $info)
           <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>
                  {{$info['name']}}
                  </a>
            </td>
                 <td>{{$info['price']}}</td>
                 <td>{{$info['discount']?$info['discount'].'%':'-'}}</td>
                 <td>{{$info['discount']?$info['price']-($info['price']*$info['discount']/100):$info['price']}}</td>
                 <td><a href="/category/{{$info['id']}}/edit" class="btn btn-primary">Edit</a></td>
                 <td>
                  <form method="post" action="/category/{{$info['id']}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Do you want to Delete?')">Delete</button>
                  </form>
                 </td>
           </tr>
           @endforeach

           
     </tbody>
    </table>
</div>
@endsection