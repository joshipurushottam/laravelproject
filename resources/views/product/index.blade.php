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
    <a href="/product/create" class="btn btn-primary">New Product</a>
    <table class="table table-striped">
     <thead>
           <tr>
              <th>S.No</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Quantity</th>
              <th>After Discount</th>
              <th>MFD</th>
              <th>Edit</th>
              <th>Delete</th>
              
           </tr>
     </thead>
     <tbody>
           @foreach ($data as $info)
           <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>
                  {{-- <a href="/product/{{$info['id']}}/edit"> --}}
                  {{$info['product_name']}}
                  </td>
                  <td>
                        @foreach($info['allcategory'] as $cid)
                              {{$cid['categoryId']['name'].","}}
                        
                        @endforeach
                  </td>
                 <td>{{$info['product_price']}}</td>
                 <td>{{$info['discount']?$info['discount'].'%':'-'}}</td>
                 <td>{{$info['quantity']?$info['quantity']:'No'}}</td>
                 <td>{{$info['product_price']-($info['discount']*$info['product_price']/100)}}</td>
                 <td>{{$info['mfd']?$info['mfd']:'-'}}</td>
                 <td><a href="/product/{{$info['id']}}/edit" class="btn btn-primary">Edit</a></td>
                
                 <td>
                  <form method="post" action="/product/{{$info['id']}}">
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