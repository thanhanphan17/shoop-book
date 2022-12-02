<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\danhmuc;

class Bookcontroller extends Controller
{
	public function getDanhsach()
	{
		$book=book::where('new','>=',0)->paginate(5);
		//$book=book::orderBy('id','DESC')->get();
		return view( 'admin.book.danhsach',['book'=>$book]);

	}
    //
    public function getThem()
	{
		$danhmuc=danhmuc::all();
		return view( 'admin.book.them',['danhmuc'=>$danhmuc]);
	}

	public function postThem(Request $request)
	{


		$this->validate($request,
			[
			'danhmuc'=>'required',
			'Tensach'=>'required|min:3|max:100|unique:book,tensach',
			'Tacgia'=>'required |min:3',
			'nsx'=>'required|min:3',
			'nsb'=>'required|min:4|max:4',
			'dongia'=>'required|min:4',
			'dongiakm'=>'required|min:1',
			'noidung'=>'required',
			'Hinh'=>'required'
			],
			[
			'danhmuc.required'=>'Bạn chưa chọn danh mục',
			'Tensach.required'=>'Bạn chưa nhập tên sách',
			'Tacgia.required'=>'Bạn chưa nhập tên tác giả',
			'nsx.required'=>'Bạn chưa nhập nhà xuất bản',
			'nsb.required'=>'Bạn chưa nhập năm xuất bản',
			'dongia.required'=>'Bạn chưa nhập đơn giá',
			'dongiakm.required'=>'Bạn chưa nhập đơn giá khuyến mãi',
			'noidung.required'=>'Bạn chưa nhập nội dung',
			'Hinh.required'=>'Bạn chưa chèn hình',

			'Tensach.unique'=>'tên sách đã tồn tại',
			'Tensach.min'=>'Tên sách phải có độ dài từ 3 cho đến 100 ký tự',
			'Tacgia.min'=>'Tên tác giả phải có độ dài từ 3 trở lên ',
			'nsb.min'=>'Tên năm xuất bản phải có độ dài từ 3 trở lên ',
			'Tensach.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
			'dongia.min'=>'đơn giá phải có  4 số trở lên ',
			'dongiakm.min'=>'đơn giá khuyến mãi từ số 0 trở lên ',
			'nsb.min'=>'nhập năm sai ',
			'nsb.max'=>'nhập năm sai '
			]);
		$book = new book;
		$book->tensach = $request->Tensach;
		$book->id_madm = $request->danhmuc;
		$book->tacgia = $request->Tacgia;
		$book->noidung = $request->noidung;
		$book->nxb = $request->nsx;
		$book->namxb = $request->nsb;
		$book->price = $request->dongia;
		$book->price_ud = $request->dongiakm;
		$book->new=$request->sp;
		
		//$book->image = $request->Hinh;
		if($request->hasFile('Hinh'))
		{
			$file=$request->file('Hinh');
			$duoi=$file->getClientOriginalExtension();
			if ($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg') 

			{
				return redirect('admin/book/them')->with('loi','bạn chỉ được chọn file có đuôi jpg,png,jpeg');
			}
			$name=$file->getClientOriginalName();
			$Hinh=str_random(4)."_".$name;
			while ((file_exists("source/image/product/".$Hinh))) {
				$Hinh=str_random(4)."_".$name;
				# code...
			}
			$file->move("source/image/product",$Hinh);
			$book->image=$Hinh;
		}
		else
		{
			return redirect('admin/book/them')->with('thongbao','chưa thêm hình ảnh');

		}
		$book->save();

		return redirect('admin/book/them')->with('thongbao','thêm thành công');

	}
	public function getSua($id)
	{
		$danhmuc=danhmuc::all();
		$book=book::find($id);
		return view ('admin.book.sua',['book'=>$book,'danhmuc'=>$danhmuc]);
	}
	public function postSua(Request $request,$id)
	{

		$book=book::find($id);
		$this->validate($request,
			[
			'danhmuc'=>'required',
			'Tensach'=>'required|min:3|max:100',
			'Tacgia'=>'required |min:3',
			'nsx'=>'required|min:3',
			'nsb'=>'required|min:4|max:4',
			'dongia'=>'required|min:4',
			'dongiakm'=>'required|min:1',
			'noidung'=>'required',
			
			],
			[
			'danhmuc.required'=>'Bạn chưa chọn danh mục',
			'Tensach.required'=>'Bạn chưa nhập tên sách',
			'Tacgia.required'=>'Bạn chưa nhập tên tác giả',
			'nsx.required'=>'Bạn chưa nhập nhà xuất bản',
			'nsb.required'=>'Bạn chưa nhập năm xuất bản',
			'dongia.required'=>'Bạn chưa nhập đơn giá',
			'dongiakm.required'=>'Bạn chưa nhập đơn giá khuyến mãi',
			'noidung.required'=>'Bạn chưa nhập nội dung',

			'Tensach.min'=>'Tên sách phải có độ dài từ 3 cho đến 100 ký tự',
			'Tacgia.min'=>'Tên tác giả phải có độ dài từ 3 trở lên ',
			'nsb.min'=>'Tên năm xuất bản phải có độ dài từ 3 trở lên ',
			'Tensach.max'=>'Tên danh mục phải có độ dài từ 3 cho đến 100 ký tự',
			'dongia.min'=>'đơn giá phải có  4 số trở lên ',
			'dongiakm.min'=>'đơn giá khuyến mãi từ số 0 trở lên ',
			'nsb.min'=>'nhập năm sai ',
			'nsb.max'=>'nhập năm sai '
			]);
		$book->tensach = $request->Tensach;
		$book->id_madm = $request->danhmuc;
		$book->tacgia = $request->Tacgia;
		$book->noidung = $request->noidung;
		$book->nxb = $request->nsx;
		$book->namxb = $request->nsb;
		$book->price = $request->dongia;
		$book->price_ud = $request->dongiakm;
		//$book->image = $request->Hinh;
		if($request->hasFile('Hinh'))
		{
			$file=$request->file('Hinh');
			$duoi=$file->getClientOriginalExtension();
			if ($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg') 

			{
				return redirect('admin/book/them')->with('loi','bạn chỉ được chọn file có đuôi jpg,png,jpeg');
			}
			$name=$file->getClientOriginalName();
			$Hinh=str_random(4)."_".$name;
			while ((file_exists("source/image/product/".$Hinh))) {
				$Hinh=str_random(4)."_".$name;
				# code...
			}

			$file->move("source/image/product",$Hinh);
			unlink("source/image/product/".$book->image);
			$book->image=$Hinh;
		}
		$book->save();
		return redirect('admin/book/danhsach')->with('thongbao','Sửa thành công');
	}
	public function getXoa($id)
	{
		$book=book::find($id);
		$book->delete();
		return redirect('admin/book/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
