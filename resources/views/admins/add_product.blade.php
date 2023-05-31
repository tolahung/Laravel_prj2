@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('/get-add-product')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên san pham</label>
                                <?php
                                $message = \Illuminate\Support\Facades\Session::get('message');
                                if($message){
                                    echo $message;
                                    \Illuminate\Support\Facades\Session::put('message', null);
                                }
                                ?>
                                <br>

                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder= "Nhập tên san pham..." >
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Hinh anh san pham</label>--}}
{{--                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder= "Nhập tên san pham..." >--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả san pham</label>
                                <textarea type="resize: none" rows="5" name="product_des" class="form-control" id="exampleInputPassword1" placeholder="Mô tả san pham"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                <input type="file" name ="product_image" class ="form-controll" id="exampleInputEmamil">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">giá san pham</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder= "Nhập tên san pham..." >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Noi dung san pham</label>
                                <textarea type="resize: none" rows="5" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả noi dung san pham"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh muc san pham</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0" >Ẩn</option>
                                    <option value="1" >Hiển thị</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh muc san pham</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    @foreach($tbl_category as $key)
                                    <option value="{{$key->category_id}}" >{{$key->category_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Thuong hieu san pham</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
                                    @foreach($tbl_brand as $key)
                                        <option value="{{$key->brand_id}}" >{{$key->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" name="add_product" class="btn btn-info">Thêm san pham</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
