   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Khách Hàng
                       <small>Thêm</small>
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
                   <form action="admin/khachhang/them" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Tên Khách Hàng</label>
                           <input class="form-control" name="Ten" placeholder="Nhập tên khách hàng" />
                       </div>
                       <div class="form-group">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" placeholder="Nhập tên email" />
                       </div>
                       <div class="form-group">
                           <label>Giới Tính</label>
                           <label class="radio-inline">
                               <input type="radio" name="gioitinh" value="Nữ">Nữ
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="gioitinh" value="Nam" checked="checked">Nam
                           </label>
                       </div>
                       <div class="form-group">
                           <label>Địa chỉ</label>
                           <input class="form-control" name="diachi" placeholder="Nhập địa chỉ" />
                       </div>
                       <div class="form-group">
                           <label>Số Điện thoại</label>
                           <input type="number" class="form-control" name="sdt" placeholder="Nhập số điện thoại" />
                       </div>

                       <button type="submit" class="btn btn-default">Thêm Khách Hàng</button>
                       <button type="reset" class="btn btn-default">Làm Mới</button>
                   </form>
               </div>
           </div>
           <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
   @endsection