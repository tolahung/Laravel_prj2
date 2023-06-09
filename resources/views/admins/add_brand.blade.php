@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm brand sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('/get-add-brand-product')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <?php
                                $message = \Illuminate\Support\Facades\Session::get('message');
                                if($message){
                                    echo $message;
                                    \Illuminate\Support\Facades\Session::put('message', null);
                                }
                                ?>
                                <br>

                                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder= "Nhập tên thương hiệu..." >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea type="resize: none" rows="5" name="brand_product_des" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0" >Ẩn</option>
                                    <option value="1" >Hiển thị</option>
                                </select>
                            </div>

                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
