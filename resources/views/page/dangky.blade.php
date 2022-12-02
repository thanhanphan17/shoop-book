@extends('master')
@section('content1')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng kí</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Home</a> / <span>Đăng kí</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">


		<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>
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

					<div class="form-block">
						<label for="email">Email </label>
						<input type="email" class="form-control " required name="email"> <!-- id="email" -->
					</div>

					<div class="form-block">
						<label for="your_last_name">Họ tên</label>
						<input type="text" class="form-control " required name="Ten"> <!-- id="your_last_name" -->
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ</label>
						<input type="text" class="form-control " required name="diachi"> <!-- id="adress" -->
					</div>


					<div class="form-block">
						<label for="phone">Số Điện thoại</label>
						<input type="number" class="form-control " required name="sdt"> <!-- id="phone" -->
					</div>
					<div class="form-block">
						<label for="password">Mật khẩu</label>
						<input type="password" class="form-control " required name="pass"> <!-- id="phone" -->
					</div>
					<div class="form-block">
						<label for="password">Nhập lại mật khẩu</label>
						<input type="password" class="form-control " required name="passagain"> <!-- id="phone" -->
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary" style="margin-left: 200px">Đăng Ký</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection