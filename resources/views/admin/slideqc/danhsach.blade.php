  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Slide
                      <small>danh sáh</small>
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
                  <thead>
                      <tr align="center">
                          <th>ID</th>
                          <th>Link</th>
                          <th>Image Slide</th>

                          <th>Xóa</th>
                          <th>Chi Tiết</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($slideqc as $sl)
                      <tr class="odd gradeX" align="center">
                          <td>{{$sl->id}}</td>
                          <td>{{$sl->link}}</td>
                          <td><img src="source/image/slide/{{$sl->image}}" height="100px"></td>


                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slideqc/xoa/{{$sl->id}}"> Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slideqc/sua/{{$sl->id}}">Chi Tiết</a></td>
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