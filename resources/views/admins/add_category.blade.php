@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{url('/get-add-category-product')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <?php
                            $message = \Illuminate\Support\Facades\Session::get('message');
                            if($message){
                                echo $message;
                                \Illuminate\Support\Facades\Session::put('message', null);
                            }
                            ?>
                            <br>

                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder= "Nhập tên danh mục..." >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea type="resize: none" rows="5" name="category_product_des" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0" >Ẩn</option>
                                <option value="1" >Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
