@extends('master')
@section('content1')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sách Tìm kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm Thấy {{count($book)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($book as $new)
							<div class="col-sm-3" style="margin-bottom: 60px;">
								<div class="single-item">
									@if($new->price_ud!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale"> Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsach',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
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
										<div class="clearfix">

										</div>
									</div>
									<p></p>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
	@endsection