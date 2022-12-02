   @extends('admin.giaodienlayout.index')
   @section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Users
                       <small>{{$user->name}}</small>
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
                   <form action="admin/user/sua/{{$user->id}}" method="POST">
                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                           <label>Họ Tên</label>
                           <input class="form-control" name="Ten" placeholder="Nhập tên user" value="{{$user->name}}" />
                       </div>
                       <div class="form-group">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" placeholder="Nhập tên email" value="{{$user->email}}" readonly="readonly" />
                       </div>
                       <div class="form-group">
                           <input type="checkbox" id="doipassword" name="doipass">
                           <label>Đổi Mật khẩu</label>
                           <input type="password" class="form-control password" name="pass" placeholder="Nhập password" disabled="" />

                       </div>
                       <div class="form-group">
                           <label>Nhập lại mật khẩu</label>
                           <input type="password" class="form-control password" name="passagain" placeholder="Nhập lại password" disabled="" />


                       </div>
                       <div class="form-group">
                           <label>Địa chỉ</label>
                           <input class="form-control" name="diachi" placeholder="Nhập địa chỉ" value="{{$user->diachi}}" />
                       </div>
                       <div class="form-group">
                           <label>Số Điện thoại</label>
                           <input type="number" class="form-control" name="sdt" placeholder="Nhập số điện thoại" value="{{$user->phone}}" />
                       </div>
                       <div class="form-group">
                           <label>Đặc quyền :</label>
                           <label class="radio-inline">
                               <input type="radio" name="quyen" value="0" @if($user->quyen==0)
                               {{"checked"}}
                               @endif > User

                           </label>
                           <label class="radio-inline">
                               <input type="radio" name="quyen" value="1" @if($user->quyen==1)
                               {{"checked"}}
                               @endif > Admin
                           </label>
                       </div>

                       <button type="submit" class="btn btn-default">Cập Nhật Thông Tin</button>
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



   @section('script')
   <script>
       $(document).ready(function() {

           $("#doipassword").change(function() {
               if ($(this).is(":checked")) {
                   $(".password").removeAttr('disabled');
               } else {
                   $(".password").attr('disabled', '');
               }

           });
       });
   </script>
   @endsection