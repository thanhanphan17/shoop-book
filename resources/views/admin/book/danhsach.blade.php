  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Sách
                      <small>danh sách</small>
                  </h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:30px">
                  @if(session('thongbao'))
                  <div class="alert alert-success">
                      {{session('thongbao')}}
                  </div>
                  @endif
              </div>
              <table class="table table-striped table-bordered table-hover ">
                  <thead>
                      <tr align="center">
                          <th>ID Sách</th>
                          <!-- <th>Mã Danh Mục</th> -->
                          <th>Tên Danh Mục</th>
                          <th>ảnh</th>
                          <th>Tên Sách</th>
                          <th>Tác Giả</th>
                          <!-- <th>Nội Dung</th> -->
                          <!-- <th>Nhà Xuất Bản</th> -->
                          <!-- <th>Năm Xuất Bản</th> -->
                          <th>Đơn giá</th>
                          <th>Khuyến Mãi</th>
                          <th>Sản phẩm</th>
                          <th>Xóa</th>
                          <th>Chi Tiết</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($book as $b)
                      <tr class="odd gradeX" align="center">
                          <td>{{$b->id}}</td>
                          <!-- <td>{{$b->id_madm}}</td> -->
                          <td>{{$b->danhmuc->tendm}}</td>
                          <td><img src="source/image/product/{{$b->image}}" height="100px"></td>
                          <td>{{$b->tensach}}</td>
                          <td>{{$b->tacgia}}</td>
                          <!-- <td>{{$b->noidung}}</td> -->
                          <!-- <td>{{$b->nxb}}</td> -->
                          <!-- <td>{{$b->namxb}}</td> -->
                          <td>{{$b->price}}</td>
                          <td>{{$b->price_ud}}</td>
                          <td>
                              @if($b->new==0)
                              {{'Cũ'}}
                              @else
                              {{'Mới'}}
                              @endif
                          </td>
                          <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/book/xoa/{{$b->id}}"> Xóa</a></td>
                          <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/book/sua/{{$b->id}}">Chi Tiết</a></td>
                      </tr>
                      @endforeach

                  </tbody>
              </table>
              <div class="row" style="margin-left: 400px">{{$book->links()}}</div>

          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  @endsection