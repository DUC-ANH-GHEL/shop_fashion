<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Model\Sanpham;

class FontendHomeController extends Controller
{
    public function home()
    {
        $list = Sanpham::paginate(10);
        return view('fontend.home', [
            'list' => $list
        ]);
    }
    public function shop()
    {
        $tong = Sanpham::all();
        $list = Sanpham::paginate(9);
        return view('fontend.shop', [
            'sp' => $list,
            'tong' => $tong
        ]);
    }
    //chi tiết sản phẩm
    public function detail($slug)
    {
        $detail = Sanpham::Where('slug', $slug)->first();
        if ($detail) {
            return view('fontend.detail', [
                'detail' => $detail,
                'relate' => Sanpham::paginate(4)
            ]);
        }
    }
}
