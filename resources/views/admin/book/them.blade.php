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
                   @if(session('loi'))
                   <div class="alert alert-danger">
                       {{session('loi')}}
                   </div>
                   @endif
                   <form action="admin/book/them" method="POST" enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Danh Mục</label>
                           <select class="form-control" name="danhmuc">
                               @foreach($danhmuc as $dm)
                               <option value="{{$dm->id}}">{{$dm->tendm}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Tên Sách</label>
                           <input class="form-control" name="Tensach" placeholder="Nhập tên sách" />
                       </div>
                       <div class="form-group">
                           <label>Tác Gỉa</label>
                           <input class="form-control" name="Tacgia" placeholder="Nhập tên tác giả" />
                       </div>
                       <div class="form-group">
                           <label>Nhà sản xuất</label>
                           <input class="form-control" name="nsx" placeholder="Nhập nhà sản xuất" />
                       </div>
                       <div class="form-group">
                           <label>Năm xuất bản</label>
                           <input type="number" class="form-control" name="nsb" placeholder="Nhập năm xuất bản" />
                       </div>
                       <div class="form-group">
                           <label>ĐƠN GIÁ</label>
                           <input type="number" class="form-control" name="dongia" placeholder="Nhập đơn giá" />
                       </div>
                       <div class="form-group">
                           <label>Đơn giá khuyến mãi</label>
                           <input type="number" class="form-control" name="dongiakm" placeholder="Nhập don gia khuyến mãi" />
                       </div>

                       <div class="form-group">
                           <label>Nội dung</label>
                           <textarea name="noidung" class="form-control" rows="3"></textarea>
                       </div>
                       <div class="form-group">
                           <label>Hình Ảnh</label>
                           <input type="file" name="Hinh" class="form-control" />
                       </div>

                       <div class="form-group">
                           <label>Sản Phẩm</label>
                           <label class="radio-inline">
                               <input type="radio" name="sp" value="0">Cũ
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="sp" value="1" checked="checked">Mới
                           </label>
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