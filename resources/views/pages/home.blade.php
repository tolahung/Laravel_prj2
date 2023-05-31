@extends('layout')
@section('content')
    <!--features_items-->
    <div class="features_items">
        <h2 class="title text-center">San pham moi nhat</h2>

        @foreach($tbl_product as $key)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('/pubhome/images/home/product1.jpg')}}" alt=""/>
                        <h2>{{$key -> product_price}}</h2>
                        <p>{{$key -> product_name}}</p>
                        <a href="{{'/save-cart'}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                        <a href="{{url('/chi-tiet-san-pham/'.$key->product_id.'/click')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product detail
                        </a>
                    </div>
                    </div>
                </div>
             </div>
            @endforeach
    </div>

@endsection
