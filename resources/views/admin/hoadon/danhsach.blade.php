 @extends('admin.giaodienlayout.index')
 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Hóa Đơn
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
                 <thead>
                     <tr align="center">
                         <th>ID</th>
                         <th>Tên Khách Hàng</th>
                         <th>Ngày Đặt</th>
                         <th>Tổng Tiền</th>
                         <th>Payment</th>
                         <th>Xóa</th>
                         <th>Chi Tiết</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($hoadon as $hd)
                     <tr class="odd gradeX" align="center">
                         <td>{{$hd->id}}</td>
                         <td>{{$hd->khachhang->full_name}}</td>
                         <td>{{$hd->ngaydat}}</td>
                         <td>{{$hd->tongtien}}</td>
                         <td>{{$hd->payment}}</td>
                         <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoa/{{$hd->id}}"> Xóa</a></td>
                         <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/sua/{{$hd->id}}"> Chi Tiết</a></td>
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