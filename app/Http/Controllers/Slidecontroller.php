<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slideqc;
use App\book;
use App\khachhang;
use App\hoadon;

class Slidecontroller extends Controller
{
	public function getDanhsach()
	{
		$slideqc=slideqc::all();
		return view( 'admin.slideqc.danhsach',['slideqc'=>$slideqc]);

	}
    
    public function getThem()
	{
		
		return view( 'admin.slideqc.them');
		
	}

	public function postThem(Request $request)
	{
		

		$slideqc = new slideqc;
		if($request->has('link'))
			$slideqc->link=$request->link;

		if($request->hasFile('Hinh'))
		{
			$file=$request->file('Hinh');
			$duoi=$file->getClientOriginalExtension();
			if ($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg') 

			{
				return redirect('admin/slideqc/them')->with('loi','bạn chỉ được chọn file có đuôi jpg,png,jpeg');
			}

			$name=$file->getClientOriginalName();
			$Hinh=str_random(4)."_".$name;
			while (file_exists("source/image/slide/".$Hinh)) {
				$Hinh=str_random(4)."_".$name;
				# code...
			}
			$file->move("source/image/slide",$Hinh);
			$slideqc->image=$Hinh;
		}
		else
		{
			return redirect('admin/slideqc/them')->with('loi','chưa thêm hình ảnh');

		}
		$slideqc->save();
		return redirect('admin/slideqc/them')->with('thongbao','thêm thành công');
	} 



	public function getSua($id)
	{
		$slideqc=slideqc::find($id);
		return view ('admin.slideqc.sua',['slideqc'=>$slideqc]);
	}



	public function postSua(Request $request,$id)
	{
		
		
		$slideqc=slideqc::find($id);
		if($request->has('link'))
			$slideqc->link=$request->link;

		if($request->hasFile('Hinh'))
		{
			$file=$request->file('Hinh');
			$duoi=$file->getClientOriginalExtension();
			if ($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg') 

			{
				return redirect('admin/slideqc/sua/'.$id)->with('loi','bạn chỉ được chọn file có đuôi jpg,png,jpeg');
			}

			$name=$file->getClientOriginalName();
			$Hinh=str_random(4)."_".$name;
			while (file_exists("source/image/slide/".$Hinh)) {
				$Hinh=str_random(4)."_".$name;
				# code...
			}

			$file->move("source/image/slide",$Hinh);
			unlink("source/image/slide".$slideqc->image);
			$slideqc->image=$Hinh;
		}
		$slideqc->save();
		return redirect('admin/slideqc/danhsach')->with('thongbao','sửa thành công');
	}



	public function getXoa($id)
	{
		$slideqc=slideqc::find($id);
		$slideqc->delete();
		return redirect('admin/slideqc/danhsach')->with('thongbao','Đã xóa thành công');
	}
}
