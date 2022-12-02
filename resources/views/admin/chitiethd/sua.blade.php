   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Chi Tiết Hóa Đơn
                       <small>{{$chitiethd->id}}</small>
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
                   <form action="admin/chitiethd/sua/{{$chitiethd->id}}" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Hóa đơn</label>
                           <select class="form-control" name="mahoadon">
                               @foreach($hoadon as $hd)
                               <option value="{{$hd->id}}">{{$hd->id}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Tên sách</label>
                           <select class="form-control" name="Ten">
                               @foreach($book as $b)
                               <option value="{{$b->id}}">{{$b->tensach}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Số lượng</label>
                           <input class="form-control" name="soluong" placeholder="nhập số lượng" value="{{$chitiethd->soluong}}" />
                       </div>
                       <div class="form-group">
                           <label>ĐƠN GIÁ</label>
                           <input type="number" class="form-control" name="dongia" placeholder="Nhập đơn giá" value="{{$chitiethd->dongia}}" />
                       </div>

                       <button type="submit" class="btn btn-default">Cập Nhật</button>
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