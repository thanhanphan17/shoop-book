<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'pagecontroller@getIndex'
]);
Route::get('danh-muc-sach/{type}',[
	'as'=>'danhmucsach',
	'uses'=>'pagecontroller@getDanhmuc'

]);
Route::get('chi-tiet-sach/{id}',[
	'as'=>'chitietsach',
	'uses'=>'pagecontroller@getChiTietSach'

]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'pagecontroller@getLienhe'

]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'pagecontroller@getGioithieu'

]);
Route::get('del-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'pagecontroller@getThemGioHang'
]);
Route::get('add-to-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'pagecontroller@getXoagiohang'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'pagecontroller@getDatHang'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'pagecontroller@postDatHang'

]);
Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'pagecontroller@getDangnhap'

]);
Route::post('dang-nhap',[
	'as'=>'dang-nhap',
	'uses'=>'pagecontroller@postDangnhap'

]);
Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'pagecontroller@getDangky'

]);
Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'pagecontroller@postDangky'

]);
Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'pagecontroller@postDangxuat'

]);
Route::get('nguoi-dung',[
	'as'=>'nguoidung',
	'uses'=>'pagecontroller@getNguoidung'
]);
Route::post('nguoi-dung',[
	'as'=>'nguoidung',
	'uses'=>'pagecontroller@postNguoidung'
]);
Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'pagecontroller@getSeacrh'
]);







Route::get('admin/dangnhap','Usercontroller@getDangnhapAdmin');
Route::post('admin/dangnhap','Usercontroller@postDangnhapAdmin');
Route::get('admin/dangxuat','Usercontroller@getDangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'admindangnhap'],function(){

	Route::group(['prefix'=>'danhmuc'],function(){
		//admin/danhmuc/them
			Route::get('danhsach','Danhmuccontroller@getDanhsach');
			
			Route::get('sua/{id}','Danhmuccontroller@getSua');
			Route::post('sua/{id}','Danhmuccontroller@postSua');

			Route::get('them','Danhmuccontroller@getThem');
			Route::post('them','Danhmuccontroller@postThem');

			Route::get('xoa/{id}','Danhmuccontroller@getXoa');


});
	Route::group(['prefix'=>'book'],function(){
		//admin/book/them
			Route::get('danhsach','Bookcontroller@getDanhsach');
			
			Route::get('sua/{id}','Bookcontroller@getSua');
			Route::post('sua/{id}','Bookcontroller@postSua');

			Route::get('them','Bookcontroller@getThem');
			Route::post('them','Bookcontroller@postThem');
			Route::get('xoa/{id}','Bookcontroller@getXoa');

			

});
	Route::group(['prefix'=>'hoadon'],function(){
		//admin/hoadon/them
			Route::get('danhsach','Hoadoncontroller@getDanhsach');


			Route::get('them','Hoadoncontroller@getThem');
			Route::post('them','Hoadoncontroller@postThem');


			Route::get('sua/{id}','Hoadoncontroller@getSua');
			Route::post('sua/{id}','Hoadoncontroller@postSua');
			Route::get('xoa/{id}','Hoadoncontroller@getXoa');

});
	Route::group(['prefix'=>'chitiethd'],function(){
		//admin/chitiethd/them
			Route::get('danhsach','chitiethdcontroller@getDanhsach');
			Route::get('them','chitiethdcontroller@getThem');
			Route::get('sua/{id}','chitiethdcontroller@getSua');
			Route::post('sua/{id}','chitiethdcontroller@postSua');
			Route::get('xoa/{id}','chitiethdcontroller@getXoa');
});
	Route::group(['prefix'=>'slideqc'],function(){
		//admin/slideqc/them
			Route::get('danhsach','Slidecontroller@getDanhsach');
			Route::get('them','Slidecontroller@getThem');
			Route::post('them','Slidecontroller@postThem');


			Route::get('sua/{id}','Slidecontroller@getSua');
			Route::post('sua/{id}','Slidecontroller@postSua');
			Route::get('xoa/{id}','Slidecontroller@getXoa');
});
	Route::group(['prefix'=>'user'],function(){
		//admin/user/them
			Route::get('danhsach','Usercontroller@getDanhsach');

			
			Route::get('them','Usercontroller@getThem');
			Route::post('them','Usercontroller@postThem');


			Route::get('sua/{id}','Usercontroller@getSua');
			Route::post('sua/{id}','Usercontroller@postSua');
			Route::get('xoa/{id}','Usercontroller@getXoa');
});
	Route::group(['prefix'=>'khachhang'],function(){
		//admin/khachhang/them
			Route::get('danhsach','KhachHangcontroller@getDanhsach');

			
			Route::get('them','KhachHangcontroller@getThem');
			Route::post('them','KhachHangcontroller@postThem');


			Route::get('sua/{id}','KhachHangcontroller@getSua');
			Route::post('sua/{id}','KhachHangcontroller@postSua');
			Route::get('xoa/{id}','KhachHangcontroller@getXoa');
});
	Route::group(['prefix'=>'donhang'],function(){
		//admin/khachhang/them
			Route::get('danhsach','Donhangcontroller@getDanhsach');
			Route::get('sua/{id}','Donhangcontroller@getSua');
			Route::post('sua/{id}','Donhangcontroller@postSua');
			Route::get('xoa/{id}','Donhangcontroller@getXoa');
});
	

});
