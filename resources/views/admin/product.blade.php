@extends('layout.admin_template')

@section('admin_content')

<div class="container">
    <form action="{{URL('product_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control" id="exampleFormControlInput1">
    </div>

    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
    <label for="formFile" class="form-label">Select image</label>
    <input class="form-control" type="file" name="img">
    </div>

    <select class="form-select"  name="category_id">
    @foreach($cats as $cat)
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
    </select>

    <select class="form-select"  name="color_id[]" multiple>
    @foreach($colors as $color)
    <option value="{{$color->id}}">{{$color->name}}</option>
    @endforeach
    </select>

    <button class="btn btn-primary" type="submit">Save</button>
    </form>


    <table class="table table-border">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>image</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>
                    <ul style="list-style: none;padding: 0;"><li>{{$item->id}}</li></ul>
                </td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}&#163;</td>
                <td><img width=50 src="uploads/{{$item->img}}" alt=""></td>
                <td>{{$item->get_category->name}}</td>
                <td><a href="{{URL('product_edit/'.$item->id)}}">Edit</a></td>
                <td><a href="{{URL('product_delete/'.$item->id)}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>


@endsection
