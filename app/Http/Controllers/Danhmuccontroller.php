<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\danhmuc;

class Danhmuccontroller extends Controller
{
	public function getDanhsach()
	{
		$danhmuc=danhmuc::all();
		return view( 'admin.danhmuc.danhsach',['danhmuc'=>$danhmuc]);

	}
    //
    public function getThem()
	{
		return view( 'admin.danhmuc.them');
	}

	public function postThem(Request $request)
	{


		$this->validate($request,
			[
			'Ten'=>'required|min:3|max:100|unique:danhmuc,tendm'
			],
			[
			'Ten.required'=>'Bạn chưa nhập tên danh mục',
			'Ten.unique'=>'tên thể loại đã tồn tại',
			'Ten.min'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
			'Ten.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
			]);
		$danhmuc = new danhmuc;
		$danhmuc->tendm = $request->Ten;

		$danhmuc->save();

		return redirect('admin/danhmuc/them')->with('thongbao','thêm thành công');

	}
	public function getSua($id)
	{
		$danhmuc=danhmuc::find($id);
		return view ('admin.danhmuc.sua',['danhmuc'=>$danhmuc]);
	}
	public function postSua(Request $request,$id)
	{
		$danhmuc=danhmuc::find($id);
		$this->validate($request,
			[
				'Ten'=>'required|unique:danhmuc,tendm|min:3|max:100'


			],

			[
				'Ten.required'=>'Bạn chưa nhập tên thể loại',
				'Ten.unique'=>'tên thể loại đã tồn tại',
				'Ten.min'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
				'Ten.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',

			]
			);
		$danhmuc->tendm=$request->Ten;
		$danhmuc->save();
		return redirect('admin/danhmuc/sua/'.$danhmuc->id)->with('thongbao','Sửa thành công');
	}
	public function getXoa($id)
	{
		$danhmuc=danhmuc::find($id);
		$danhmuc->delete();
		return redirect('admin/danhmuc/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
