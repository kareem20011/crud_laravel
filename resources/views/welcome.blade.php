@extends('layout.template')
@section('content')


        <!-- Contact-->
        <section class="contact-section bg-black py-5">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">

                @foreach($products as $product)
                <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <img class="mb-3" src="uploads/{{$product->img}}" width="50">
                                <h4 class="text-uppercase m-0">{{$product->name}}</h4>
                                <div class="small text-black-50">{{$product->price}}&#163;</div>
                                <hr class="my-4 mx-auto" />
                                @if(Auth::user())
                                <button id="add_tocart" user_id="{{Auth::user()->id}}" product_id="{{$product->id}}" class="btn btn-info add_tocart">Add to cart</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
            <div style="display: none;" id="msg" class="alert alert-light" role="alert"></div>
        </section>


@endsection
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        $(".add_tocart").click(function(){
            var user_id = this.getAttribute('user_id')
            var product_id = this.getAttribute('product_id')
            console.log(product_id)
            console.log(user_id)
            $.ajax({
                url : "{{url('add_to_cart')}}",
                data : {'user_id' : user_id, 'product_id' : product_id},
                success : function(result){
                    document.getElementById('msg').style.display='block'
                    document.getElementById('msg').innerText=result
                    console.log(result)
                }
            })

        });

    });
</script>
