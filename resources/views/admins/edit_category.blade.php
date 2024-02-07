@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa danh mục sản phẩm
                </header>
                <?php
                $message = \Illuminate\Support\Facades\Session::get('message');
                if($message){
                    echo $message;
                    \Illuminate\Support\Facades\Session::put('message', null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        @foreach($tbl_category as $edit)
                            <form role="form" action="{{url('/get-edit-category-product/'.$edit->category_id.'/click')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" value="{{$edit->category_name}}">
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea type="resize: none" rows="5" name="category_product_des" class="form-control" id="exampleInputPassword1" >{{$edit->category_des}}</textarea>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                        @endforeach
                    </div>


                </div>
            </section>

        </div>
    </div>
@endsection
