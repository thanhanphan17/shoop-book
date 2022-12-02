@extends('master')
@section('content1')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Danh mục : {{$sp_danhmuc->danhmuc->tendm}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Chi tiết sách</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						@if($sp_danhmuc->price_ud!=0)
						<div class="ribbon-wrapper">
							<div class="ribbon sale"> Sale</div>
						</div>
						@endif
						<img src="{{asset('source/image/product/'.$sp_danhmuc->image)}}" alt="" height="300px">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">
							<h3>{{$sp_danhmuc->tensach}}</h3>
							</p>
							<br />
							<p class="single-item-price">
							<h6>Giá :</h6>
							@if($sp_danhmuc->price_ud==0)

							<span class="flash-sale" style="font-size: 20px">{{number_format($sp_danhmuc->price)}} VNĐ</span>
							@else
							<span class="flash-del" style="font-size: 20px">{{number_format($sp_danhmuc->price)}} VNĐ</span>
							<span class="flash-sale" style="font-size: 20px">{{number_format($sp_danhmuc->price_ud)}} VNĐ</span>
							@endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc" style="font-size: 20px">
							<p>Tác giả :
								{{$sp_danhmuc->tacgia}}
							</p>
						</div>
						<br />

						<div class="single-item-desc" style="font-size: 20px">

							<p>Nhà Xuất Bản : {{$sp_danhmuc->nxb}}</p>
						</div>
						<br />

						<div class="single-item-desc" style="font-size: 20px">

							<p>
								<bold> Năm xuất bản : </bold>{{$sp_danhmuc->namxb}}
							</p>
						</div>


						<div class="space20">&nbsp;</div>

						<!-- <p><h6>Số lượng:</h6></p> -->
						<div class="single-item-options">

							<a class="add-to-cart" href="{{route('themgiohang',$sp_danhmuc->id)}}" style="width: 150px; color: #c70; font-size: 20px"><i class="fa fa-shopping-cart"></i><b> Giỏ hàng</b> </a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Nội dung</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p> {{$sp_danhmuc->noidung}}</p>
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>{{$sp_danhmuc->danhmuc->tendm}} Tương tự :</h4>
					<br />

					<div class="row">
						@foreach($sp_khac as $sk)
						<div class="col-sm-4">
							<div class="single-item" style="margin-bottom: 20px">
								@if($sk->price_ud!=0)
								<div class="ribbon-wrapper">
									<div class="ribbon sale"> Sale</div>
								</div>
								@endif
								<div class="single-item-header">
									<a href="{{route('chitietsach',$sk->id)}}"><img src="{{asset('source/image/product/'.$sk->image)}}" alt="" height="250px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$sk->tensach}}</p>
									<p class="single-item-price">
										@if($sk->price_ud==0)

										<span class="flash-sale">{{number_format($sk->price)}} VNĐ</span>
										@else
										<span class="flash-del">{{number_format($sk->price)}} VNĐ</span>
										<span class="flash-sale">{{number_format($sk->price_ud)}} VNĐ</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{route('themgiohang',$sk->id)}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{route('chitietsach',$sk->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach

					</div>
					<div class="row" align="center">{{$sp_khac->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Sản phẩm giảm giá</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($sachkm as $km)
							<div class="media beta-sales-item">
								@if($km->price_ud!=0)
								<div class="ribbon sale" style=" height: 10px; width: 20px ;font-size: 8px ; margin-left: 40px;">Sale
									</a></div>
								@endif
								<a class="pull-left" href="{{route('chitietsach',$km->id)}}"><img src="{{asset('source/image/product/'.$km->image)}}" alt=""></a>
								<div class="media-body">
									{{$km->tensach}}
									<br />

									Giá :<span class="flash-del" style="font-size: 15px">{{number_format($km->price)}} VNĐ</span>
									<br />
									Giá Khuyến Mãi :<span class="beta-sales-price" style="font-size: 15px"> {{number_format($km->price_ud)}} VNĐ</span>

								</div>

							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div> <!-- best sellers widget -->

			<div class="widget">
				<h3 class="widget-title">Sản phẩm mới</h3>
				<div class="widget-body">
					<div class="beta-sales beta-lists">
						@foreach($new_book as $new)

						<div class="media beta-sales-item">
							@if($new->price_ud!=0)
							<div class="ribbon sale" style=" height: 10px; width: 20px ;font-size: 5px ; margin-left: 40px"> Sale</div>
							@endif
							<a class="pull-left" href="{{route('chitietsach',$new->id)}}"><img src="{{asset('source/image/product/'.$new->image)}}" alt=""></a>
							<div class="media-body">
								{{$new->tensach}}
								<br />
								@if($new->price_ud==0)
								Giá : <span class="beta-sales-price" style="font-size: 15px">{{number_format($new->price)}} VNĐ</span>
								@else
								Giá :<span class="flash-del" style="font-size: 15px">{{number_format($new->price)}} VNĐ</span>
								<br />
								Giá Khuyến Mãi :<span class="beta-sales-price" style="font-size: 15px"> {{number_format($new->price_ud)}} VNĐ</span>
								@endif
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div> <!-- best sellers widget -->
		</div>
	</div>
</div> <!-- #content -->
</div> <!-- .container -->
@endsection