@extends('layout.admin_template')
@section('admin_content')

<div class="container text-center">
<table class="table table-border">
    <tr>
        <th>User id</th>
        <th>Product name</th>
        <th>Order quantity</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->users->name}}</td>
            <td>{{$product->product->name}}</td>
            <td>{{$product->quantity}}</td>
        </tr>
    @endforeach
</table>
</div>

@stop
