@extends('layout.admin_template')

@section('admin_content')

<div class="container">
    <form action="{{URL('color_update/'.$colors->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input value="{{$colors->name}}" type="text" name="name" class="form-control" id="exampleFormControlInput1" >
    </div>

    <button class="btn btn-primary" type="submit">Save</button>
    </form>

</div>


@endsection
