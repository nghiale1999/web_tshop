<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\ModelLichsu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
