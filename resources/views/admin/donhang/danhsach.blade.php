@extends('admin.giaodienlayout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:20px">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>

            <table class="table table-striped table-bordered table-hover" id="">
                <!--dataTables-example-->
                <thead>
                    <tr align="center">
                        <th>id Hóa đơn</th>
                        <th>ID Khách Hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tên Sách</th>
                        <th>Số Lượng</th>
                        <th>Đơn giá</th>
                        <th>Hình Thức Thanh Toán</th>
                        <th>Ngày Đặt Hàng</th>

                        <th>Xóa</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chitiethd as $hd)
                    <tr class="odd gradeX" align="center">
                <tbody>
                    <tr>
                        <td>{{$hd->id_hd}}</td>
                    </tr>
                </tbody>
                <td></td>

                <td>{{$hd->hoadon->khachhang->full_name}}</td>
                <td>{{$hd->hoadon->khachhang->diachi}}</td>
                <td>{{$hd->hoadon->khachhang->phone}}</td>
                <td>{{$hd->book->tensach}}</td>

                <td>{{$hd->soluong}}</td>
                <td>{{$hd->dongia}}</td>
                <td>{{$hd->hoadon->payment}}</td>
                <td>{{$hd->hoadon->ngaydat}}</td>


                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$hd->id}}"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$hd->id}}">Chi Tiết</a></td> <!--  -->
                </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection