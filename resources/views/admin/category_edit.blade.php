@extends('layout.admin_template')

@section('admin_content')

<div class="container">
    <form action="{{URL('category_update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input value="{{$cats->name}}" type="text" name="name" class="form-control" id="exampleFormControlInput1" >
    <input type="hidden" value="{{$cats->id}}" name="id">
    </div>

    <button class="btn btn-primary d-block m-auto" type="submit">Update</button>
    </form>
</div>
@stop
