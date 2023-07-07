@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Thanh toán giỏ hàng/li>
                </ol>
            </div><!--/breadcrums-->


            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
            </div>

            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
//                        echo '<pre>';
//                        print_r($content);
//                        echo'<pre>';
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">San pham</td>
                        <td class="price">Gia</td>
                        <td class="quantity">So luong</td>
                        <td class="total">Tong tien</td>
                        <td class="total">Xoa</td>

                    </tr>



                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                        <tr>
                            {{--                        <td class="cart_product">--}}
                            {{--                            <a href=""><img src="{{asset('/pubhome/images/home/product1.jpg')}}" alt=""></a>--}}
                            {{--                        </td>--}}

                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                                <p>PRODUCT_ID: {{$v_content->id}}</p>
                            </td>

                            <td class="cart_price">
                                <p>{{$v_content->price}}</p>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{url('/update-cart-quantity')}}" method="POST">
                                        @csrf
                                        <input class="cart_quantity_input" type="number" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class = "btn btn-default btn-sm">
                                        <input type="submit" value="Cap nhat" name="update_qty" class = "btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price">
                                        <?php
                                        $sub = $v_content->price * $v_content->qty;
                                        echo $sub;
                                        ?>
                                </p>
                            </td>

                            <td class="cart_delete">
                                <br>
                                <a class="cart_quantity_delete" href="{{url('/delete-cart/'.$v_content->rowId.'/click')}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <h4> Chọn hình thức thanh toán </h4>
            <br> <br>

            <form action="{{url('/order-place')}}" method="POST">
                @csrf
            <div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox">Trả bằng thẻ</label>
					</span>
                <span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                </span>
                <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm">
            </div>
            </form>
        </div>
    </section> <!--/#cart_items-->
@endsection
