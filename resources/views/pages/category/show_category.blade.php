@extends('layout')
@section('content')
    <!--features_items-->
    <div class="features_items">
{{--@foreach($cate_name as $key => $name_cate)--}}
        <h2 class="title text-center">Danh muc san pham</h2>
{{--        @endforeach--}}

        @foreach($byid as $key => $byid)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('/pubhome/images/home/product1.jpg')}}" alt=""/>
                            <h2>{{$byid -> product_price}}</h2>
                            <p>{{$byid -> product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                            <a href="{{url('/chi-tiet-san-pham/'.$byid->product_id.'/click')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product detail
                            </a>
                        </div>

                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
