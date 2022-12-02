  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Khách Hàng
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
                  <!--dataTables-example-->
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Giới tính</th>
                          <th>Địa chỉ</th>
                          <th>Số điện thoại</th>
                          <th>Ghi chú Đặt Hàng</th>
                          <th>Xóa</th>
                          <th>Chi Tiết</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($khachhang as $kh)
                      <tr class="odd gradeX" align="center">
                          <td>{{$kh->id}}</td>
                          <td>{{$kh->full_name}}</td>
                          <td>{{$kh->email}}</td>
                          <td>{{$kh->gioitinh}}</td>
                          <td>{{$kh->diachi}}</td>
                          <td>{{$kh->phone}}</td>
                          <td>{{$kh->ghichu}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$kh->id}}"> Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$kh->id}}">Chi Tiết</a></td>
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