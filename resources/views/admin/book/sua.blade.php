   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Sách
                       <small>{{$book->tensach}}</small>
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
                   <form action="admin/book/sua/{{$book->id}}" method="POST" enctype="multipart/form-data">
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
                           <input class="form-control" name="Tensach" placeholder="Nhập tên sách" value="{{$book->tensach}}" />
                       </div>
                       <div class="form-group">
                           <label>Tác Gỉa</label>
                           <input class="form-control" name="Tacgia" placeholder="Nhập tên tác giả" value="{{$book->tacgia}}" />
                       </div>
                       <div class="form-group">
                           <label>Nhà sản xuất</label>
                           <input class="form-control" name="nsx" placeholder="Nhập nhà sản xuất" value="{{$book->nxb}}" />
                       </div>
                       <div class="form-group">
                           <label>Năm xuất bản</label>
                           <input class="form-control" name="nsb" placeholder="Nhập năm xuất bản" value="{{$book->namxb}}" />
                       </div>
                       <div class="form-group">
                           <label>ĐƠN GIÁ</label>
                           <input class="form-control" name="dongia" placeholder="Nhập đơn giá" value="{{$book->price}}" />
                       </div>
                       <div class="form-group">
                           <label>Đơn giá khuyến mãi</label>
                           <input class="form-control" name="dongiakm" placeholder="Nhập don gia khuyến mãi" value="{{$book->price_ud}} " />
                       </div>

                       <div class="form-group">
                           <label>Nội dung</label>
                           <textarea name="noidung" class="form-control" rows="3">{{$book->noidung}}</textarea>
                       </div>
                       <div class="form-group">
                           <label>Hình Ảnh</label>
                           <p>
                               <img width="250px" height="300px" src="source/image/product/{{$book->image}}" />
                           </p>
                           <input type="file" name="Hinh" class="form-control" />
                       </div>

                       <div class="form-group">
                           <label>Sản Phẩm</label>
                           <label class="radio-inline">
                               <input type="radio" name="cu" value="0" @if($book->new==0)
                               {{"checked"}}
                               @endif
                               >Cũ
                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="cu" value="1" @if($book->new==1)
                               {{"checked"}}
                               @endif >Mới
                           </label>
                       </div>
                       <button type="submit" class="btn btn-default">Cập nhật</button>
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