  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">User
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
                  @if(session('thongbo'))
                  <div class="alert alert-danger">
                      {{session('thongbo')}}
                  </div>
                  @endif

              </div>
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Họ và Tên</th>
                          <th>Email</th>
                          <!--<th>Password</th>-->
                          <th>Số điện thoại</th>
                          <th>Địa chỉ</th>
                          <th>Quyền</th>
                          <th>Xóa</th>
                          <th>Thông Tin</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($user as $u)
                      <tr class="odd gradeX" align="center">
                          <td>{{$u->id}}</td>
                          <td>{{$u->name}}</td>
                          <td>{{$u->email}}</td>
                          <!--<td>{{$u->password}}</td>-->
                          <td>{{$u->phone}}</td>
                          <td>{{$u->diachi}}</td>
                          <td>
                              @if($u->quyen==0)
                              {{'user'}}
                              @else
                              {{'admin'}}
                              @endif
                          </td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$u->id}}"> Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Thông Tin</a></td>
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