@extends('master')
@section('title')
Thêm mới sản phẩm
@endsection
@section('content')
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
        <label for="category_id" class="form-label">Category:</label>
        <select class="form-select" id="category_id"  name="category_id">
            @foreach($category as $id =>$name)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
        <label for="Sku" class="form-label">Sku:</label>
        <input type="text" class="form-control" id="sku" placeholder="Enter sku" name="sku">
    </div>
    <div class="mb-3 mt-3">
        <label for="img_thumb" class="form-label">Img Thumb:</label>
        <input type="file" class="form-control" id="img_thumb" name="img_thumb">
    </div>
    <div class="mb-3 mt-3">
        <label for="overview" class="form-label">Overview:</label>
        <input type="text" class="form-control" id="overview"  name="overview">
    </div>
    <div class="mb-3 mt-3">
        <label for="content" class="form-label">Content:</label>
        <textarea type="text" class="form-control"  row="10" id="content"  name="content"></textarea>
    </div>
    <a href="{{route('products.index')}}" class="btn btn-success">Quay lại</a>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection