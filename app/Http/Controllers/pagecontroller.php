<?php

namespace App\Http\Controllers;
use App\slideqc;
use App\book;
use App\danhmuc;
use App\Cart;
use Session;
use Illuminate\Http\Request;
use App\khachhang;
use App\hoadon;
use App\chitiethd;
use App\User;
use Illuminate\Support\Facades\Auth;
class pagecontroller extends Controller
{
    //trang chủ
	public function getIndex(){
		$slideqc=slideqc::all();
		$new_book=book::where('new',1)->paginate(4, ['*'], 'pag');
        $sachkm=book::where('price_ud','<>',0)->paginate(8);


		return view('page.trangchu',compact('slideqc','new_book','sachkm'));
        
	}
    //danh mục
    public function getDanhmuc($type){
        
        $sp_dm=book::where('id_madm',$type)->paginate(6 , ['*'], 'pag');
        $dm_khac=book::where('id_madm','<>',$type)->paginate(3);
        $loaidanhmuc=danhmuc::all();
        $loai_danhmuc=danhmuc::where('id',$type)->first();
    	return view('page.danhmuc',compact('sp_dm','dm_khac','loaidanhmuc','loai_danhmuc'));
    }

    public function getLienhe(){
    	return view('page.lienhe');
    }

     public function getGioithieu(){
    	return view('page.gioithieu');
    }
   /* chi tiết sách*/
    public function getChiTietSach(Request $req){
        $sp_danhmuc=book::where('id',$req->id)->first();
        $sp_khac=book::where('id_madm',$sp_danhmuc->id_madm)->paginate(6);
        $new_book=book::where('new',1)->paginate(4);
        $sachkm=book::where('price_ud','<>',0)->paginate(4);
        return view('page.sach',compact('sp_danhmuc','sp_khac','new_book','sachkm'));
    }

    /*add gio hang*/


    public function getThemGioHang(Request $req, $id)
    {
        $san_pham=book::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($san_pham,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    /*xóa giỏ hàng*/

    public function getXoagiohang($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
             Session::put('cart',$cart);
            # code...
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    /*đặt hàng*/
    public function getDatHang(){
        return view('page.dathang');
    }
    public function postDatHang(Request $req)
    {
        $cart=Session::get('cart');


        $khachhang=new khachhang;
        $khachhang->full_name=$req->Ten;
        $khachhang->gioitinh=$req->gender;
        $khachhang->email=$req->email;
        $khachhang->diachi=$req->diachi;
        $khachhang->phone=$req->sdt;
        $khachhang->ghichu=$req->ghichu;
        $khachhang->save();

        $hoadon=new hoadon;
        $hoadon->id_kh=$khachhang->id;
        $hoadon->ngaydat=date('Y-m-d');
        $hoadon->tongtien=$cart->totalPrice;
        $hoadon->payment=$req->payment_method;
        $hoadon->save();

        foreach ($cart->items as $key => $value) {
        $chitiethd=new chitiethd;
        $chitiethd->id_hd=$hoadon->id;
        $chitiethd->id_book=$key;
        $chitiethd->soluong=$value['qty'];
        $chitiethd->dongia=($value['price']/$value['qty']);
        $chitiethd->save();
            # code...
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt Hàng thành công');
       


    }
/*    đăng nhập
*/    public function getDangnhap(){

        return view('page.dangnhap');
    }
    public function postDangnhap(Request $req){
        $this->validate($req,
            [
           
            'email'=>'required',
            'pass'=>'required|min:6|max:50',
           
            ],
            [
            'email.required'=>'Bạn chưa nhập email',
            'pass.required'=>'Bạn chưa nhập Mật khẩu',
           
         
           
            'pass.min'=>'Mật khẩu phải có độ dài từ 6 cho đến 50 ký tự',
          
            'pass.max'=>'Mật khẩu phải có độ dài từ 6 cho đến 50 ký tự',
        ]);
       if (Auth::attempt(['email'=>$req->email,'password'=>$req->pass]))
         {  
             if(Auth::check())
            {
                $user=Auth::user();
                if ($user->quyen==1)
                return redirect('admin/book/danhsach');
            else
                return redirect('index');
            }

        }
        else
        {
            return redirect()->back()->with('thongbao','Sai email đăng nhập hoặc mật khẩu');
        }
    }
/*    đăng ký 
*/    public function getDangky(){

        return view('page.dangky');
    }
    public function postDangky(Request $req){

       $this->validate($req,
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
            'pass.required'=>'Bạn chưa nhập Mật khẩu',
            'passagain.required'=>'Bạn chưa nhập lại Mật khẩu',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'passagain.same'=>'nhập lại Mật khẩu chưa khớp',
            'email.email'=>'Bạn  nhập thiếu @ email ',
            'Ten.min'=>'Tên  phải có độ dài từ 3 cho đến 100 ký tự',
            
            'pass.min'=>'Mật khẩu phải có độ dài từ 6 cho đến 50 ký tự',
            'diachi.min'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
            'sdt.min'=>'số điện thoại phải có độ dài từ 8 cho đến 20 số',

            'Ten.max'=>'Tên phải có độ dài từ 3 cho đến 100 ký tự',
            'pass.max'=>'Mật khẩu phải có độ dài từ 6 cho đến 50 ký tự',
            'diachi.max'=>'địa chỉ phải có độ dài từ 4 cho đến 255 ký tự',
            'sdt.max'=>'số điện thoại phải có độ dài từ 8 cho đến 20ký tự',


            'email.unique'=>'email đã đăng ký rồi',
        ]);
        $user = new User;
        $user->name = $req->Ten;
        $user->email = $req->email;
        $user->password = bcrypt($req->pass);
        $user->diachi = $req->diachi;
        $user->phone = $req->sdt;
        $user->quyen = 0;

        $user->save();

        return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
    }
   /* đăng xuất*/

    function postDangxuat()
    {
        Auth::logout();
        return redirect('index');
    }

/*    thong tin nuoi dùng
*/    function getNguoidung()
    {
        $user=Auth::user();
        return view('page.nguoidung',['nguoidung'=>$user]);

    }
    function postNguoidung(Request $req)
    {

            $this->validate($req,
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
        $user=Auth::user();
        $user->name = $req->Ten;
        $user->diachi = $req->diachi;
        $user->phone = $req->sdt;
       
       
        if($req->doipass=="on")
        {
            $this->validate($req,
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
             $user->password = bcrypt($req->pass);       
        }
        $user->save();

        return redirect()->back()->with('thongbao','sửa thành công');
    }
/*    tìm kiếm sách 
*/    function getSeacrh(Request $req)
    {
        $book=book::where('tensach','like','%'.$req->timkiem.'%')->orwhere('price',$req->timkiem)->orwhere('tacgia',$req->timkiem)->get();
        return view('page.timkiem',compact('book'));
    }

}
