<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Sanpham;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        return view('admin.addproduct',[
            'cats'=>$cats
        ]);
    }
    //đưa dữ liệu từ form vào database
    public function add(Request $req)
    {
       // validate form
        $this->validate(
            $req,
            [
                'name' => 'required',
                'slug' => 'required',
                'gia' => 'required',
                'parent'=>'required',
                'hinhsp' => 'required|mimes:jpg,jpeg,png,gif,bmp',
                'mota' => 'required'
            ],
            [
                'name.required' => 'tên sản phẩm không được để trống',
                'slug.required' => 'đường dẫn tĩnh không được để trống',
                'parent.required'=>'danh mục cha không được để trống',
                'gia.required' => 'giá sản phẩm không được để trống',
                'hinhsp.required' => 'hình sản phẩm không được để trống',
                'mota.required' => 'mô tả sản phẩm không được để trống',
                'hinhsp.mimes'=>'ảnh phải có các định dạng: jpg,jpeg,png,gif,bmp'


            ]
        );
        //upload file
        // $file_name='';
        if($req->hasFile('hinhsp')){
            $file = $req->file('hinhsp');
            $file_name = date('Y-m-d-h-s-i').$file->getClientOriginalName();//tên file khi được upload
            $file -> move(base_path('uploads/'),$file_name);

        }


        Sanpham::create([
            'name' => $req->name,
            'slug' => $req->slug,
            'parent'=>$req->parent,
            'gia' => $req->gia,
            'hinhsp' => $file_name,
            'mota' => $req->mota
        ]);

        return redirect()->route('themsp');
    }
    //lấy dữ liệu từ databe ra danh sách sản phẩm
    public function list()
    {
        $tong = Sanpham::all();
        $list = Sanpham::search()->paginate(5);
        return view('admin.listproduct', [
            'ds' => $list,
            'tong'=>$tong
        ]);
    }
    //xóa sản phẩm
    public function delete($id)
    {
        Sanpham::destroy($id);
        return redirect()->route('dssp');
    }
    //sửa sản phẩm
    public function edit($id)
    {
        $sua = Sanpham::find($id);
        return view('admin.editproduct', [
            'edit' => $sua
        ]);
    }
    public function update($id, Request $req)
    {
         // validate form
         $this->validate(
            $req,
            [
                'name' => 'required',
                'slug' => 'required',
                'gia' => 'required',
                'hinhsp' => 'required|mimes:jpg,jpeg,png,gif,bmp',
                'mota' => 'required'
            ],
            [
                'name.required' => 'tên sản phẩm không được để trống',
                'slug.required' => 'đường dẫn tĩnh không được để trống',
                'gia.required' => 'giá sản phẩm không được để trống',
                'hinhsp.required' => 'hình sản phẩm không được để trống',
                'mota.required' => 'mô tả sản phẩm không được để trống',
                'hinhsp.mimes'=>'ảnh phải có các định dạng: jpg,jpeg,png,gif,bmp'


            ]
        );
        Sanpham::find($id)->update($req->all());
        return redirect()->route('dssp');
    }
}