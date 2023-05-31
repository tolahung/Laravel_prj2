@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <?php
            $name = \Illuminate\Support\Facades\Session::get('mess');
            if($name == true){
                echo $name;
            }
            ?>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên san pham</th>
                        <th>Hiển thị</th>
                        <th>Danh muc</th>
                        <th>Thuong hieu</th>
                        <th style="width:30px;">Xử lý</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tbl_product as $key)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$key->product_name}}</td>
                            <td><span class="text-ellipsis">
                              <?php
                                    if($key->product_status==0){
                                        ?>
                                        <a href="{{url('/unactive-product/'.$key->product_id.'/click')}}">Ẩn</a>
                                <?php
                                    }else{
                                        ?>
                                            <a href="{{url('/active-product/'.$key->product_id.'/click')}}">Hiển thị</a>
                                <?php
                                    }
                                        ?>
                            </span></td>

{{--                            -------Danh muc---------------}}
                            <td>
                                    {{$key->category_name}}
                            </td>
{{--                            -------Thương hiẹu---------------}}
                            <td>
                                {{$key->brand_name}}
                            </td>

                            <td>
                                <a href="{{url('/edit-category-product/'.$key->product_id.'/click')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>

                                <a onclick = "return confirm('Are you sure to delete')" href="{{url('/delete-category-product/'.$key->category_id.'/click')}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
