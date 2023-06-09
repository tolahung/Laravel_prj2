@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="register-req">
                <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lilchj sử mua hàng</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền mẫu gửi hàng</p>
                            <div class="form-one">
                                <form action="{{url('/save-checkout-customer')}}" method="POST">
                                @csrf
                                    <input name="shipping_email" type="text" placeholder="Email">
                                    <input name="shipping_name" type="text" placeholder="Ho va ten">
                                    <input name="shipping_phone" type="text" placeholder="Phone">
                                    <input name="shipping_address" type="text" placeholder="Address">
                                    <textarea name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                                </form>
                            </div>

                        </div>
                    </div>
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="order-message">--}}
{{--                            <p>Ghi chú gửi hàng</p>--}}
{{--                            <textarea name="message"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
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

            <div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox">Trả bằng thẻ</label>
					</span>
                <span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                </span>

            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
