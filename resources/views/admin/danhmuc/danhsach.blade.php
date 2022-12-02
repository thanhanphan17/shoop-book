  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Danh mục
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
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Tên Danh Mục</th>
                          <th>Xóa</th>
                          <th>Chi Tiết</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($danhmuc as $dm)
                      <tr class="odd gradeX" align="center">
                          <td>{{$dm->id}}</td>
                          <td>{{$dm->tendm}}</td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/danhmuc/xoa/{{$dm->id}}">Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhmuc/sua/{{$dm->id}}">Chi Tiết</a></td>
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