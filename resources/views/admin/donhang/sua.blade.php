   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Đơn hàng
                       <small>{{$chitiethd->hoadon->khachhang->full_name}}</small>
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
                   <form action="admin/donhang/sua/{{$chitiethd->hoadon->id}}" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>ID Khách Hàng</label>
                           <input class="form-control" name="idkh" placeholder="Nhập tên khách hàng" value="{{$chitiethd->hoadon->id_kh}} " readonly="readonly" />
                       </div>
                       <div class="form-group">
                           <label>Tên Khách Hàng</label>
                           <input class="form-control" name="Ten" placeholder="Nhập tên khách hàng" value="{{$chitiethd->hoadon->khachhang->full_name}} " readonly="readonly" />
                       </div>
                       <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="Email" name="email" placeholder="Nhập tên khách hàng" value="{{$chitiethd->hoadon->khachhang->email}} " readonly="readonly" />
                       </div>
                       <div class="form-group">
                           <label>Địa chỉ</label>
                           <input class="form-control" name="Ten" placeholder="Nhập tên khách hàng" value="{{$chitiethd->hoadon->khachhang->diachi}} " disabled="" />
                       </div>

                       <div class="form-group">
                           <label>Số điện thoại</label>
                           <input class="form-control" name="sdt" placeholder="Nhập tên khách hàng" value="{{$chitiethd->hoadon->khachhang->phone}} " disabled="" />
                       </div>

                       <div class="form-group">
                           <label>Giới Tính</label>
                           <label class="radio-inline">
                               <input type="radio" name="gioitinh" disabled="" value="Nữ" @if($chitiethd->hoadon->khachhang->gioitinh=='Nữ')
                               {{"checked"}}
                               @endif />Nữ
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="gioitinh" disabled="" value="Nam" @if($chitiethd->hoadon->khachhang->gioitinh=='Nam')
                               {{"checked"}}
                               @endif />Nam
                           </label>
                       </div>

                       <div class="form-group">
                           <label>Ngày Đặt</label>
                           <input type="date" class="form-control" disabled="" name="ngaydat" value="{{$chitiethd->hoadon->ngaydat}}" />
                       </div>
                       <div class="form-group">
                           <label>Tổng Tiền Thanh Toán</label>
                           <input type="number" class="form-control" disabled="" name="tongtien" value="{{$chitiethd->hoadon->tongtien}}" />
                       </div>
                       <!--<div class="form-group">
                                <label>Payment</label>
                                <input class="form-control" name="pay" value="{{$chitiethd->hoadon->payment}}"/>
                            </div>-->
                       <div class="form-group">
                           <label>Payment</label>
                           <label class="radio-inline">
                               <input type="radio" name="pay" disabled="" value="COD" @if($chitiethd->hoadon->payment=='COD')
                               {{"checked"}}
                               @endif />COD
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="pay" disabled="" value="Visa" @if($chitiethd->hoadon->payment=='VISA')
                               {{"checked"}}
                               @endif />VISA
                           </label>
                       </div>
                       <div class="form-group">
                           <label>Ghi chú</label>
                           <textarea name="noidung" disabled="" class="form-control" rows="3">{{$chitiethd->hoadon->khachhang->ghichu}}</textarea>
                       </div>
                       <!-- 
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button> -->
                       <form>
               </div>
           </div>
           <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
   @endsection