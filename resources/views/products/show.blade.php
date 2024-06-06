@extends('master')
@section('title')
Chi tiết sản phẩm : {{$product->name}}
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Field Name</th>
            <th>Value</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($product->toArray() as $field=>$value)
        <tr>
            <td>{{ucfirst($field)}}</td>
            <td>
                @if($field=='img_thumb')
                <img src="{{asset($value)}}" alt="" width="150px">
                @elseif($field == 'category_id')
                {{$product->category->name}}
                @else
                    {{$value}}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{route('products.index')}}" class="btn btn-success">Quay lại</a>
@endsection