    @extends('admin.giaodienlayout.index')
    @section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách Hàng
                        <small>{{$khachhang->full_name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif

                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <form action="admin/khachhang/sua/{{$khachhang->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />

                        <div class="form-group">
                            <label>Tên Khách Hàng </label>
                            <input class="form-control" name="Ten" placeholder="Điền tên khách hàng" value="{{$khachhang->full_name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Điền tên danh mục" value="{{$khachhang->email}}" />
                        </div>
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <label class="radio-inline">
                                <input type="radio" name="gioitinh" value="Nữ" @if($khachhang->gioitinh=='Nữ')
                                {{"checked"}}
                                @endif />Nữ
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gioitinh" value="Nam" @if($khachhang->gioitinh=='Nam')
                                {{"checked"}}
                                @endif />Nam
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" name="diachi" placeholder="Điền tên danh mục" value="{{$khachhang->diachi}}" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" name="sdt" placeholder="Điền tên danh mục" value="{{$khachhang->phone}}" />
                        </div>

                        <button type="submit" class="btn btn-default">Cập Nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    @endsection