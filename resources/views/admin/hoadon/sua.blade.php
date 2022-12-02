  @extends('admin.giaodienlayout.index')
  @section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Hóa Đơn
                      <small>{{$hoadon->id}}</small>
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
                  <form action="admin/hoadon/sua/{{$hoadon->id}}" method="POST">
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <div class="form-group">
                          <label>Tên Khách Hàng</label>
                          <input class="form-control" name="Ten" placeholder="Nhập tên khách hàng" value="{{$hoadon->khachhang->full_name}} " readonly="readonly" />
                      </div>

                      <div class="form-group">
                          <label>Ngày Đặt</label>
                          <input type="date" class="form-control" name="ngaydat" value="{{$hoadon->ngaydat}}" />
                      </div>
                      <div class="form-group">
                          <label>Tổng Tiền Thanh Toán</label>
                          <input type="number" class="form-control" name="tongtien" value="{{$hoadon->tongtien}}" />
                      </div>
                      <!--<div class="form-group">
                                <label>Payment</label>
                                <input class="form-control" name="pay" value="{{$hoadon->payment}}"/>
                            </div>-->
                      <div class="form-group">
                          <label>Payment</label>
                          <label class="radio-inline">
                              <input type="radio" name="pay" value="COD" @if($hoadon->payment=='COD')
                              {{"checked"}}
                              @endif />COD
                          </label>
                          <label class="radio-inline">
                              <input type="radio" name="pay" value="Visa" @if($hoadon->payment=='VISA')
                              {{"checked"}}
                              @endif />VISA
                          </label>
                      </div>
                      <button type="submit" class="btn btn-default">Cập Nhật</button>
                      <button type="reset" class="btn btn-default">Làm mới</button>
                      <form>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  @endsection