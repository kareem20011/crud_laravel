@extends('layout.admin_template')

@section('admin_content')

<div class="container">
    <form action="{{URL('category_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
    </div>
  
    <button class="btn btn-primary" type="submit">Save</button>
    </form>


    <table class="table table-border">
        <tr>
            <th>Name</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>

                <td><a href="{{URL('category_edit/'.$item->id)}}">Edit</a></td>

                <td><a href="{{URL('category_delete/'.$item->id)}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>


@endsection