@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($tbl_brand as $edit)
                            <form role="form" action="{{url('/get-edit-brand-product/'.$edit->brand_id.'/click')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chỉnh sửa thuong hieu</label>
                                        <?php
                                        $message = \Illuminate\Support\Facades\Session::get('message');
                                        if($message){
                                            echo $message;
                                            \Illuminate\Support\Facades\Session::put('message', null);
                                        }
                                        ?>
                                    <br>

                                    <input type="text" name="edit_brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Moot at">

                                </div>


                                <button type="submit" name="edit_brand_product" class="btn btn-info">Cập nhật thuong hieu</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
