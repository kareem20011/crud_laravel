@extends('layout.template')
@section('content')

<h1 style="text-align: center; margin: 3rem;font-weight:bold;">Welcome : {{Auth::user()->name}}</h1>

<div class="container">
<form action="{{URL('cart_check_out')}}" method="post">
@csrf


<table class="table table-border">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Delete</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->get_product->name}}</td>
            <td>{{$product->get_product->price}}&#163;</td>
            <td><img src="uploads/{{$product->get_product->img}}" alt="..." width="50"></td>
            <td><input name="quantity[]" type="number" value="1"></td>
            <td><a href="{{URL('cart_delete_item/'.$product->id)}}"><i class="fa fa-trash"></i></a></td>
            <input name="id[]" type="hidden" value="{{$product->get_product->id}}">
        </tr>
    @endforeach
</table>
<button type="submit" class="btn btn-primary">Check out</button>
</form>
</div>
@stop
