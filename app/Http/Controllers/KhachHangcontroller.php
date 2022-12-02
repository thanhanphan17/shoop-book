<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;

class KhachHangcontroller extends Controller
{
	public function getDanhsach()
	{
		$khachhang=khachhang::all();
		return view( 'admin.khachhang.danhsach',['khachhang'=>$khachhang]);

	}
    //
    public function getThem()
	{
		return view( 'admin.khachhang.them');
	}

	/*public function postThem(Request $request)
	{


		$this->validate($request,
			[
			'Ten'=>'required|min:3|max:100'
			'diachi'=>
			'sdt'=>
			'email'=>
			
			],
			[
			'Ten.required'=>'Bạn chưa nhập tên ',
			
			'Ten.min'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
			'Ten.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',

			]);
		$khachhang = new khachhang;
		$khachhang->full_name = $request->Ten;
		$khachhang->gioitinh=$request->gioitinh;
		$khachhang->diachi = $request->diachi;
		$khachhang->email = $request->email;
		$khachhang->phone = $request->sdt;


		$khachhang->save();

		return redirect('admin/khachhang/them')->with('thongbao','thêm thành công');

	}*/
	public function getSua($id)
	{
		$khachhang=khachhang::find($id);
		return view ('admin.khachhang.sua',['khachhang'=>$khachhang]);
	}
	public function postSua(Request $request,$id)
	{
		$khachhang=khachhang::find($id);
		$this->validate($request,
			[
				'Ten'=>'required|min:3|max:100',
				'email'=>'required|min:3|max:100',
				
				'diachi'=>'required|min:3|max:100',
				'sdt'=>'required|min:9|max:20'


			],

			[
				'Ten.required'=>'Bạn chưa nhập tên ',
				'email.required'=>'Bạn chưa nhập tên ',
				
				'diachi.required'=>'Bạn chưa nhập tên ',
				'sdt.required'=>'Bạn chưa nhập tên ',
				
				'Ten.min'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'email.min'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'diachi.min'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'sdt.min'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'Ten.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'email.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'sdt.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
				'diachi.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',

			]
			);
		$khachhang->full_name=$request->Ten;
		$khachhang->email=$request->email;
		$khachhang->gioitinh=$request->gioitinh;
		$khachhang->diachi=$request->diachi;
		$khachhang->phone=$request->sdt;

		$khachhang->save();
		return redirect('admin/khachhang/danhsach')->with('thongbao','Sửa thành công');
	}
	public function getXoa($id)
	{
		$khachhang=khachhang::find($id);
		$khachhang->delete();
		return redirect('admin/khachhang/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
