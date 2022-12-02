<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitiethd;
use App\book;
use App\khachhang;
use App\hoadon;

class chitiethdcontroller extends Controller
{
	public function getDanhsach()
	{
		$chitiethd=chitiethd::all();
		return view( 'admin.chitiethd.danhsach',['chitiethd'=>$chitiethd]);

	}
    //
    /*public function getThem()
	{
		$khachhang=khachhang::all();
		return view( 'admin.chitiethd.them',['khachhang'=>$khachhang]);
		
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
		$chitiethd = new chitiethd;
		$chitiethd->id_kh = $request->Ten;
		//$chitiethd->khachhang->full_name=$request->Ten;
		$chitiethd->ngaydat=$request->ngaydat;
		$chitiethd->tongtien=$request->tongtien;
		$chitiethd->payment=$request->pay;
		$chitiethd->save();
		return redirect('admin/chitiethd/them')->with('thongbao','Sửa thành công');
	} */
	public function getSua($id)
	{
		$hoadon=hoadon::all();
		$book=book::all();
		
		$chitiethd=chitiethd::find($id);
		return view ('admin.chitiethd.sua',['chitiethd'=>$chitiethd,'book'=>$book,'hoadon'=>$hoadon]);
	}
	public function postSua(Request $request,$id)
	{
		$chitiethd=chitiethd::find($id);
		$this->validate($request,
			[

				
				'soluong'=>'required',
				'dongia'=>'required |min:4',
				


			],

			[
				
				'soluong.required'=>'Bạn chưa số lượng',
				'dongia.required'=>'Bạn chưa Đơn giá',
				
				'dongia.min'=>'Nhập số tiền trên 4 số',

			]
			);
		$chitiethd->id_book=$request->Ten;
		$chitiethd->id_hd=$request->mahoadon;
		$chitiethd->dongia=$request->dongia;
		$chitiethd->soluong=$request->soluong;
		$chitiethd->save();
		return redirect('admin/chitiethd/danhsach')->with('thongbao','Sửa thành công');
	}
	public function getXoa($id)
	{
		$chitiethd=chitiethd::find($id);
		$chitiethd->delete();
		return redirect('admin/chitiethd/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
