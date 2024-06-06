@extends('master')
@section('title')
Danh sách sản phẩm
@endsection
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success"> 
        {{session()->get('success')}}
    </div>
@endif
<h2><a href="{{route('products.create')}}" class="btn btn-success">Create</a></h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Img_thumb</th>
            <th>Name</th>
            <th>Sku</th>
            <th>Category</th>
            <th>Overview</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><img src="{{asset($item->img_thumb)}}" alt="" width="150px"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->sku}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->overview}}</td>
            <td>
                <a href="{{route('products.show',$item)}}" class="btn btn-primary mt-3">show</a>
                <a href="{{route('products.edit',$item)}}" class="btn btn-info mt-3">edit</a>
                <form action="{{route('products.destroy',$item)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3" onclick="return confirm('xoa')" type="submit">Xóa</button>
                </form> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@endsection