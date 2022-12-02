@extends('master')
@section('content1')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer">
			<div class="banner">
				<ul>
					@foreach($slideqc as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>

					</li>
					@endforeach

				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sách Mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm Thấy {{count($new_book)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($new_book as $new)
							<div class="col-sm-3">
								<div class="single-item">
									@if($new->price_ud!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale"> Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsach',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="350px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$new->tensach}}</p>
										<p class="single-item-price">
											@if($new->price_ud==0)

											<span class="flash-sale">{{number_format($new->price)}} VNĐ</span>
											@else
											<span class="flash-del">{{number_format($new->price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($new->price_ud)}} VNĐ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsach',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
									<p></p>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$new_book->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sách Khuyến Mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm Thấy {{count($sachkm)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sachkm as $skm)
							<div class="col-sm-3">
								<div class="single-item">
									@if($skm->price_ud!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale"> Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsach',$skm->id)}}"><img src="source/image/product/{{$skm->image}}" alt="" height="350px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$skm->tensach}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{number_format($skm->price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($skm->price_ud)}} VNĐ</span>
										</p>
									</div>
									<div class="single-item-caption" style="margin: 10px 15px 30px 15px">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsach',$skm->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
						<div class="row">{{$sachkm->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
	@endsection