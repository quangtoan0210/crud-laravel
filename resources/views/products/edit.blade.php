@extends('master')
@section('title')
Cập nhật sản phẩm: {{$product->name}}
@endsection
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success"> 
        {{session()->get('success')}}
    </div>
@endif
<form action="{{route('products.update',$product)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
        <label for="category_id" class="form-label">Category:</label>
        <select class="form-select" id="category_id"  name="category_id">
            @foreach($category as $id =>$name)
                <option @if($product->category_id == $id) selected @endif value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$product->name}}"> 
    </div>
    <div class="mb-3 mt-3">
        <label for="Sku" class="form-label">Sku:</label>
        <input type="text" class="form-control" id="sku" placeholder="Enter sku" name="sku" value="{{$product->sku}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="img_thumb" class="form-label">Img Thumb:</label>
        <input type="file" class="form-control" id="img_thumb" name="img_thumb">
        <img src="{{asset($product->img_thumb)}}" alt="" width="50PX">
    </div>
    <div class="mb-3 mt-3">
        <label for="overview" class="form-label">Overview:</label>
        <input type="text" class="form-control" id="overview"  name="overview" value="{{$product->overview}}">
    </div>
    <a href="{{route('products.index')}}" class="btn btn-success">Quay lại</a>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection