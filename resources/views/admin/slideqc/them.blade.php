   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Slide
                       <small>thêm slide</small>
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
                   <form action="admin/slideqc/them" method="POST" enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Link</label>
                           <input name="link" class="form-control" placeholder="Nhập Link" />
                       </div>
                       <div class="form-group">
                           <label>Hình Ảnh</label>
                           <input type="file" name="Hinh" class="form-control" />
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