   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Sách
                       <small>thêm</small>
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
                   <form action="admin/hoadon/them" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Tên Khách hàng</label>
                           <select class="form-control" name="Ten">
                               @foreach($khachhang as $kh)
                               <option value="{{$kh->id}}">{{$kh->full_name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Ngày Đặt</label>
                           <input type="date" class="form-control" name="ngaydat" placeholder="" />
                       </div>
                       <div class="form-group">
                           <label>Tổng Tiền</label>
                           <input type="number" class="form-control" name="tongtien" placeholder="" />

                       </div>
                       <div class="form-group">
                           <label>Payment</label>

                           <input class="form-control" name="pay" placeholder="" />

                       </div>
                       <button type="submit" class="btn btn-default">Thêm Mới</button>
                       <button type="reset" class="btn btn-default">Làm Mới</button>
                       <form>
               </div>
           </div>
           <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
   @endsection