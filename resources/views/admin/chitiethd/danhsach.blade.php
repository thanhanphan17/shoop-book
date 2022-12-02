  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">CHI TIẾT HÓA ĐƠN
                      <small>DANH SÁCH</small>
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
              <table class="table table-striped table-bordered table-hover">
                  <!-- id="dataTables-example"-->
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>MÃ HÓA ĐƠN</th>
                          <th>Tên Sách</th>
                          <th>SỐ LƯỢNG</th>
                          <th>ĐƠN GIÁ</th>
                          <th>Xóa</th>
                          <th>Chi Tiết</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($chitiethd as $cthd)
                      <tr class="odd gradeX" align="center">
                          <td>{{$cthd->id}}</td>
                          <td>{{$cthd->id_hd}}</td>
                          <td>{{$cthd->book->tensach}}</td>
                          <td>{{$cthd->soluong}}</td>
                          <td>{{$cthd->dongia}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitiethd/xoa/{{$cthd->id}}"> Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitiethd/sua/{{$cthd->id}}">Chi Tiết</a></td>
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