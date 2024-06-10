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


    <form action="/product/{{$info['id']}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="mb-3">
            <label for="product_name">Select Category:</label>

            <div class="dgrid">
              @foreach($cdata as $pinfo)

              <div>

              
              <input type="checkbox" id="{{$pinfo['id']}}" {{(in_array($pinfo['id'],$category))?"checked":""}} name="category_ id[]" value="{{$pinfo['id']}}">
              <label for="{{$pinfo['id']}}">
              {{$pinfo['name']}}
            </label>
            </div>
            @endforeach
          </div>
      </div>


      <div class="mb-3">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" name="product_name" id="product_name" value="{{$info['product_name']}}" required placeholder="Enter Product Name">
            </div>
      
      
        <div class="mb-3">
          <label for="product_price">Price</label>
          <input type="text" class="form-control" name="product_price" id="product_price" value="{{$info['product_price']}}" required placeholder="Enter Price">
        </div>
      
      
          <div class="mb-3">
            <label for="discount">Discount</label>
            <input type="text" class="form-control" name="discount" id="discount" value="{{$info['discount']}}" required placeholder="Enter Discount">
          </div>
            
      
            <div class="mb-3">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" name="quantity" id="quantity" value="{{$info['quantity']}}" required placeholder="Enter Quantity">
            </div>
      
            <div class="mb-3">
              <label for="mfd">Mfd</label>
              <input type="date" class="form-control" name="mfd" id="mfd" value="{{$info['mfd']}}" required placeholder="Enter Mfd">
            </div>
           
          
           
            @if($info['photos'])
            <div>
             
            @foreach($info->photos as $img)
            <div title="Click X for delete this image" id="photo_{{$img['id']}}">
              <img src="/photos/{{$img['image']}}" height="100">

              <span onclick="delme({{$img['id']}})" style='font-size:30px; cursor:pointer; color:red;'>&#10006;

              </span>
              </div>
            @endforeach
          </div>
            @endif
            <div class="mb-3">
              <label for="photo">Photo</label>
              <input type="file" class="form-control" name="photo[]"  multiple id="photo" accept="image/jpeg">
            </div>
        <div class="mb-3">
                  <button class="btn btn-success">Save</button>
       </div>

   
</form>
</div>  
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

            function delme(id)
            {
                if(confirm("do you want to delete this image"))
                {
              $.ajax({
                url:"/deleteimg/"+id,
                  type:"get",
                  success:function(r)
                  {
                    document.getElementById('photo_'+id).remove();
                      alert("done");
                  }
                }
                  )}
                }
            
          
    </script>
@endsection