@extends('master')
@section('content1')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">

		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin khách hàng</h4>
					<div class="space20">&nbsp;</div>
					@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
					@endif

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="Ten" placeholder="Họ tên" required value="<?php echo Auth::user()->name ?>">
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>

					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" required placeholder="expample@gmail.com" name="email" value="<?php echo Auth::user()->email ?>">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" placeholder="Street Address" required name="diachi" value="<?php echo Auth::user()->diachi ?>">
					</div>


					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="number" id="phone" required name="sdt" value="<?php echo Auth::user()->phone ?>">
					</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="ghichu">Không có ghi chú</textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head">
							<h5>Đơn hàng của bạn</h5>
						</div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">

								<div>
									@if(Session::has('cart'))
									@foreach($sp_cart as $spp)
									<!--  one item	 -->

									<div class="media">
										<img width="25%" src="source/image/product/{{$spp['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large" style="font-size: 20px"> {{$spp['item']['tensach']}} </p> <br />


											@if($spp['item']['price_ud']!=0)
											<span class="color-gray your-order-info" style="font-size: 15px"> Đơn Giá : {{number_format($spp['item']['price_ud'])}} VNĐ</span>
											@else
											<span class="color-gray your-order-info" style="font-size: 15px"> Đơn Giá :
												{{number_format($spp['item']['price'])}} VNĐ </span>
											@endif
											<span class="color-gray your-order-info" style="font-size: 15px"> Số lượng : {{$spp['qty']}}</span>
										</div>
									</div>
									@endforeach
									@else
									<p class="font-large" style="font-size: 20px"> Không có đơn hàng nào </p> <br />

									@endif
									<!-- end one item -->
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left">
									<p class="your-order-f18">Tổng tiền: </p>
								</div>
								<div class="pull-right">
									<h5 class="color-black">@if(Session::has('cart'))
										{{number_format(Session('cart')->totalPrice)}}
										@else
										0
										@endif
										VNĐ
									</h5>
								</div>
								<div class="clearfix"></div>
							</div>

						</div>
						<div class="your-order-head">
							<h5>Hình thức thanh toán</h5>
						</div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="VISA" data-order_button_text="" s>
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>
								</li>

							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection