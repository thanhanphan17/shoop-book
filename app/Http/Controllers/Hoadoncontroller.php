<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use App\book;
use App\khachhang;

class Hoadoncontroller extends Controller
{
	public function getDanhsach()
	{
		$hoadon=hoadon::all();
		return view( 'admin.hoadon.danhsach',['hoadon'=>$hoadon]);

	}
    //
    public function getThem()
	{
		$khachhang=khachhang::all();
		return view( 'admin.hoadon.them',['khachhang'=>$khachhang]);
		
	}

	public function postThem(Request $request)
	{


		$this->validate($request,
			[
			'Ten'=>'required',
				'ngaydat'=>'required',
				'tongtien'=>'required |min:4',
				'pay'=>'required'
				
			],
			[
			'Ten.required'=>'Bạn chưa chọn khách hàng',
				
				'ngaydat.required'=>'Bạn chưa NHẬP NGÀY',
				'tongtien.required'=>'Bạn chưa tính Tổng tiền',
				'pay.required'=>'Bạn chưa nhập kiểu thanh toán',
				'tongtien.min'=>'Nhập số tiền trên 4 số',
			
			]);
		$hoadon = new hoadon;
		$hoadon->id_kh = $request->Ten;
		//$hoadon->khachhang->full_name=$request->Ten;
		$hoadon->ngaydat=$request->ngaydat;
		$hoadon->tongtien=$request->tongtien;
		$hoadon->payment=$request->pay;
		$hoadon->save();
		return redirect('admin/hoadon/them')->with('thongbao','Sửa thành công');
	}
	public function getSua($id)
	{
		$khachhang=khachhang::all();
		
		$hoadon=hoadon::find($id);
		return view ('admin.hoadon.sua',['hoadon'=>$hoadon,'khachhang'=>$khachhang]);
	}
	public function postSua(Request $request,$id)
	{
		$hoadon=hoadon::find($id);
		$this->validate($request,
			[
				'Ten'=>'required|min:3|max:100',
				'ngaydat'=>'required',
				'tongtien'=>'required |min:4',
				'pay'=>'required'


			],

			[
				'Ten.required'=>'Bạn chưa nhập tên thể loại',
				'Ten.min'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
				'Ten.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
				'ngaydat.required'=>'Bạn chưa NHẬP NGÀY',
				'tongtien.required'=>'Bạn chưa Tổng tiền',
				'pay.required'=>'Bạn chưa nhập kiểu thanh toán',
				'tongtien.min'=>'Nhập số tiền trên 4 số',

			]
			);
		$hoadon->khachhang->full_name=$request->Ten;
		$hoadon->ngaydat=$request->ngaydat;
		$hoadon->tongtien=$request->tongtien;
		$hoadon->payment=$request->pay;
		$hoadon->save();
		return redirect('admin/hoadon/danhsach')->with('thongbao','Sửa thành công');
	}
	public function getXoa($id)
	{
		$hoadon=hoadon::find($id);
		$hoadon->delete();
		return redirect('admin/hoadon/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
