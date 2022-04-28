<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelSanpham;
use App\ModelBaiviet;
use App\ModelBinhluan;
use App\ModelDgsao;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request){
        $data = ModelSanpham::orderBy('id','desc')->paginate(10);
        $sao = ModelDgsao::all();
        return view('member.home', compact('data', 'sao'));
    }

    public function search(Request $request){
        $search = $request->search;
        $data = ModelSanpham::where('tensp', 'like', "%{$search}%")->orderBy('id','desc')->paginate(10);
        return view('member.home', compact('data'));
    }
    public function baiViet(){
         session()->flush();
        $data = ModelBaiviet::paginate(6);
        return view('member.baiviet',compact('data'));
    }

    public function baiVietChiTiet(Request $request, $id){
        if($request->isMethod('post')){
            
            $data = new ModelBinhluan;
            $data->id_bv = $id;
            $data->id_users = Auth::user()->id;
            $data->ten_users = Auth::user()->name;
            $data->anh_users = Auth::user()->anh;
            $data->noidung = $request->comment;
            $data->id_bl = 0;
            if($request->id_cmt != ''){
                $data->id_bl = $request->id_cmt;
            }
            if($data->save()){
                return redirect()->back();
            }
        }
        $data = ModelBaiviet::findOrfail($id);
        $comment = ModelBinhluan::where('id_bv',$id)->get();
        return view('member.baiviet-chitiet', compact('data', 'comment'));

    }
    

    
}
