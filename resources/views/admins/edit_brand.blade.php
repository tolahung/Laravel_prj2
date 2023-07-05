@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa thương hiệu sản phẩm

                </header>

                <div class="panel-body">

                    <div class="position-center">
                        @foreach($tbl_brand as $edit)
                            <form role="form" action="{{url('/get-edit-brand-product/'.$edit->brand_id.'/click')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" value="{{$edit->brand_name}}">
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea type="resize: none" rows="5" name="brand_des" class="form-control" id="exampleInputPassword1" >{{$edit->brand_des}}</textarea>
                                </div>
                                <button type="submit" name="submit_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
