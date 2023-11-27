@extends('layout.admin_template')

@section('admin_content')
    <select id="cat">
        <option disabled selected>choose category</option>
        @foreach($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <select id="product"></select>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    //     $( '#cat' ).ready(function(){
    //     $("button").click(function(){
    //     $("p").slideToggle();
    // });
    // }); 

    $("#cat").change(function(){
        document.getElementById('product').innerText='';
        var id = $( this ).val()

        $.ajax({
            url: "{{ url('get_products') }}",
            data: {'id' : id},

            success : function (result){
                console.log(result)
                var select = document.getElementById('product');

                for(item of result){
                    var op = document.createElement('option');
                    op.value=item.id;
                    op.innerText=item.name;
                    select.appendChild(op);
                }
            }
        })
    })
    </script>
@endsection