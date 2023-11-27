@extends('layout.admin_template')

@section('admin_content')

<div class="container">
    <form action="{{URL('product_update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleFormControlInput1" >
    </div>

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Price</label>
    <input type="number" name="price"  value="{{$data->price}}" class="form-control" id="exampleFormControlInput1">
    </div>

    <div class="mb-3">
    <label for="formFile" class="form-label">Select image</label>
    <input class="form-control" type="file" name="img">
    </div>

    <select class="form-select"  name="category_id">
    @foreach($cats as $cat)
    @if($data->category_id == $cat->id)
    
    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
    
    @else
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endif
    @endforeach
    </select>

    <select class="form-select"  name="color_id[]" multiple>
    @foreach($colors as $color)
    
    @if(in_array($color->id, $selected_colors))
    <option selected value="{{$color->id}}">{{$color->name}}</option>
    @else
    <option value="{{$color->id}}">{{$color->name}}</option>
    @endif
    @endforeach
    </select>

    <button class="btn btn-primary" type="submit">Save</button>
    </form>



</div>


@endsection