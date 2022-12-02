<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\book;
use App\khachhang;
use App\hoadon;
use App\User;

class Usercontroller extends Controller
{
	public function getDanhsach()
	{
		$user=User::all();
		return view( 'admin.user.danhsach',['user'=>$user]);

	}
    
    public function getThem()
	{
		
		return view( 'admin.user.them');
		
	}

	public function postThem(Request $request)
	{
		

			$this->validate($request,
			[
			'Ten'=>'required|min:3|max:100',
			'email'=>'required|email|unique:users,email',
			'pass'=>'required|min:6|max:50',
			'passagain'=>'required|same:pass',
			'diachi'=>'required|min:4|max:255',
			'sdt'=>'required|min:8|max:20',
			
			


			],
			[
			'Ten.required'=>'Bạn chưa nhập tên ',
			'email.required'=>'Bạn chưa nhập email',
			'pass.required'=>'Bạn chưa nhập password',
			'passagain.required'=>'Bạn chưa nhập lại password',
			'diachi.required'=>'Bạn chưa nhập địa chỉ',
			'sdt.required'=>'Bạn chưa nhập số điện thoại',
			'passagain.same'=>'Bạn nhập lại password chưa khớp',
			'email.email'=>'Bạn  nhập thiếu @ email ',
			'Ten.min'=>'Tên  phải có độ dài từ 3 cho đến 100 ký tự',
			
			'pass.min'=>'password phải có độ dài từ 6 cho đến 50 ký tự',
			'diachi.min'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
			'sdt.min'=>'số điện thoại phải có độ dài từ 8 cho đến 20 số',

			'Ten.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
			'pass.max'=>'password phải có độ dài từ 8 cho đến 50 ký tự',
			'diachi.max'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
			'sdt.max'=>'số điện thoại phải có độ dài từ 8 cho đến 20ký tự',


			'email.unique'=>'email đã đăng ký rồi',
			]);
		$user = new User;
		$user->name = $request->Ten;
		$user->email = $request->email;
		$user->password = bcrypt($request->pass);
		$user->diachi = $request->diachi;
		$user->phone = $request->sdt;
		$user->quyen = $request->quyen;




		$user->save();

		return redirect('admin/user/them')->with('thongbao','thêm thành công');

	} 



	public function getSua($id)
	{
		$user=User::find($id);
		return view ('admin.user.sua',['user'=>$user]);
	}



	public function postSua(Request $request,$id)
	{
		
		
		
			$this->validate($request,
			[
			'Ten'=>'required|min:3|max:100',
			'diachi'=>'required|min:4|max:255',
			'sdt'=>'required|min:8|max:20',		
			],
			[
			'Ten.required'=>'Bạn chưa nhập tên ',
			'diachi.required'=>'Bạn chưa nhập địa chỉ',
			'sdt.required'=>'Bạn chưa nhập số điện thoại',
						
			'Ten.min'=>'Tên  phải có độ dài từ 3 cho đến 100 ký tự',

			'diachi.min'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
			'sdt.min'=>'số điện thoại phải có độ dài từ 8 cho đến 20 số',

			'Ten.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
			'diachi.max'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
			'sdt.max'=>'số điện thoại phải có độ dài từ 8 cho đến 20ký tự',
			]);
		$user=User::find($id);
		$user->name = $request->Ten;
		$user->diachi = $request->diachi;
		$user->phone = $request->sdt;
		$user->quyen = $request->quyen;

		if($request->doipass=="on")
		{
			$this->validate($request,
			[
			'pass'=>'required|min:8|max:50',
			'passagain'=>'required|same:pass',
			],
			[

			'pass.required'=>'Bạn chưa nhập password',
			'passagain.required'=>'Bạn chưa nhập lại password',

			'passagain.same'=>'Bạn nhập lại password chưa khớp',
		
			'pass.min'=>'password phải có độ dài từ 8 cho đến 50 ký tự',
			
			'pass.max'=>'password phải có độ dài từ 8 cho đến 50 ký tự',
			
			]);
			$user->password = bcrypt($request->pass);
		}
		$user->save();

		return redirect('admin/user/danhsach')->with('thongbao','sửa thành công');
	}



	public function getXoa($id)
	{
		$user_current = Auth::user()->id;
		$user=user::find($id);

		if ($user->quyen==1) {
    		return redirect()->back()->with(['thongbo'=>'Bạn không thể xóa Quản trị']);
    	}
    	else{

    		
	        $user->delete();
    	
    		
		return redirect('admin/user/danhsach')->with('thongbao','Đã xóa thành công');
    	}
		

	}


	public function getDangnhapAdmin()
	{
		return view('admin.dangnhap');
	}


	public function postDangnhapAdmin(Request $req)
	{
		$this->validate($req,[
			'email'=>'required',
			'password'=>'required|min:8|max:50'
		],[
			'email.required'=>'Bạn chưa nhập email',
			'password.required'=>'Bạn chưa nhập mật khẩu',
			'password.min'=>'mật khẩu không được nhỏ hơn 8 ký tự',
			'password.max'=>'mật khẩu không được lớn hơn 50 ký tự',

		]);
		if (Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
		{
			return redirect('admin/book/danhsach');

		}
		else
		{
			return redirect('admin/dangnhap')->with('thongbao','Sai email đăng nhập hoặc mật khẩu');
		}

	}
	public function getDangxuatAdmin()
	{
		Auth::logout();
		return redirect('admin/dangnhap');
	}
}
