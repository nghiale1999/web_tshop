<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\ModelLichsu;
use App\ModelSanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LichsuController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }

    public function lichSu(){
        $id = Auth::user()->id;
        $data = ModelLichsu::where('id_user', $id)->get();
        return view('member.lichsu', compact('data'));
    }

    public function chiTietLichSu($id){
        $data = ModelLichsu::where('id', $id)->get();

        return view('member.chitiet-lichsu', compact('data'));
    }

    public function donHang (Request $request){
        // $sanpham = ModelLichsu::all();
        // $data = [];
        // foreach ($sanpham as $key => $value) {
        //     $data[] = ModelSanpham::where('id_users', Auth::user()->id)->where('id',  $value->id_sp)->get();
        // }

        $data = ModelLichsu::select(
            "lichsu.id", 
            "lichsu.tensp", 
            "lichsu.gia", 
            "lichsu.soluong", 
            "lichsu.trangthai", 
            "lichsu.tennguoinhan", 
            "lichsu.email", 
            "lichsu.sdt", 
            "lichsu.diachi", 
        )
            ->join('sanpham', 'sanpham.id', '=', 'lichsu.id_sp')
            ->join('users', 'users.id', '=', 'sanpham.id_users')
            ->where('sanpham.id_users', '=', Auth::user()->id)
            ->get();
   
        return view('member.quanlydonhang',compact('data'));
    }

    public function guiHang(Request $request){
        $id = $request->id_ls;
        $ls = ModelLichsu::findOrfail($id);
        $ls->trangthai = 'Đã gửi';
        if($ls->save()){
            return 'Đơn hàng của bạn đã được gửi đi';
        }else{
            return 'đơn hàng bị lỗi hk thể gửi';
        }
    }
    public function nhanHang(Request $request){
        $id = $request->id_ls;
        $ls = ModelLichsu::findOrfail($id);
        $ls->trangthai = 'Đã nhận';
        if($ls->save()){
            return 'Xác nhận đã nhận đơn hàng';
        }else{
            return 'đơn hàng bị lỗi không thể nhận';
        }
    }

}
