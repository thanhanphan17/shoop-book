@extends('master')
@section('content1')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Danh mục </h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>Danh mục</span> / <span>{{$loai_danhmuc->tendm}}</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loaidanhmuc as $ldm)
						<li><a href="{{route('danhmucsach', $ldm->id)}}" style="font-size: 20px">{{$ldm->tendm}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4> {{$loai_danhmuc->tendm}} </h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm Thấy {{count($sp_dm)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($sp_dm as $sd)
							<div class="col-sm-4" style="margin-bottom: 70px">
								<div class="single-item">
									@if($sd->price_ud!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale"> Sale</div>
									</div>
									@endif
									<div class="single-item-eader">
										<a href="{{route('chitietsach',$sd->id)}}"><img height="250px" src="{{asset('source/image/product/'.$sd->image)}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sd->tensach}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($sd->price_ud==0)

											<span class="flash-sale" style="margin-left: 20px">{{number_format($sd->price)}} VNĐ</span>
											@else
											<span class="flash-del">{{number_format($sd->price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($sd->price_ud)}} VNĐ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption" style="margin: 5px 0px 0px 15px">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sd->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsach',$sd->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>

									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
					<div class="row" align="center">{{$sp_dm->links()}}</div>
					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sách Khác</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm Thấy {{count($dm_khac)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($dm_khac as $dk)
							<div class="col-sm-4">
								<div class="single-item">
									@if($dk->price_ud!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale"> Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsach',$dk->id)}}"><img src="{{asset('source/image/product/'.$dk->image)}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$dk->tensach}}</p>
										<p class="single-item-price">
											@if($dk->price_ud==0)

											<span class="flash-sale" style="margin-left: 20px">{{number_format($dk->price)}} VNĐ</span>
											@else
											<span class="flash-del">{{number_format($dk->price)}} VNĐ</span>
											<span class="flash-sale">{{number_format($dk->price_ud)}} VNĐ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$dk->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsach',$dk->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>

							</div>
							@endforeach
						</div>

						<div class="row" align="center">{{$dm_khac->links()}}</div>
						<div class="space40">&nbsp;</div>

					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection