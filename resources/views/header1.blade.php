<div id="header">
	<div class="header-top">
		<div class="container">

			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
					<li><a href="admin/dangnhap"><i class="fa fa-user"></i>Admin Panel</a></li>
					@if(Auth::user()->name != 'admin')
					<li><a href="{{route('nguoidung')}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
					@endif
					<li><a href="{{route('dangxuat')}}">Đăng Xuất</a></li>
					@else
					<li><a href="{{route('dangky')}}">Đăng Ký</a></li>
					<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="index" id="logo"><img src="{{asset('source/assets/dest/images/logo.png')}}" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
						<input type="text" value="" name="timkiem" id="s" placeholder="Nhập từ khóa..." />
						<button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">

					<div class="cart">

						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart'))
							{{Session('cart')->totalQty}}
							@else Trống
							@endif
							) <i class="fa fa-chevron-down"></i>
						</div>

						@if(Session::has('cart'))
						<div class="beta-dropdown cart-body">

							@foreach($sp_cart as $spp)
							<div class="cart-item">

								<a class="cart-item-delete" href="{{route('xoagiohang',$spp['item']['id'])}}"><i class="fa fa-times"></i></a>
								<div class="media">
									<a class="pull-left" href="#"><img src="source/image/product/{{$spp['item']['image']}}" alt=""></a>
									<div class="media-body">
										<span class="cart-item-title">{{$spp['item']['tensach']}}</span>

										@if($spp['item']['price_ud']!=0)
										<span class="cart-item-amount">{{$spp['qty']}}*<span>{{number_format($spp['item']['price_ud'])}} VNĐ</span></span>
										@else
										<span class="cart-item-amount">{{$spp['qty']}}*<span>{{number_format($spp['item']['price'])}} VNĐ</span></span>
										@endif
									</div>
								</div>


							</div>
							@endforeach
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VNĐ</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						@endif
					</div> <!-- .cart -->


				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #0277b8;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
					<li><a href="#">Danh Mục</a>
						<ul class="sub-menu">
							@foreach($loai_sach as $loai)
							<li><a href="{{route('danhmucsach',$loai->id)}}">{{$loai->tendm}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
					<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div> <!-- #header -->