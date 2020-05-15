<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Account;
use Illuminate\Http\Request;

class adminUserController extends Controller
{
    public function index()
    {
        return view('admin.account.addaccount');
    }
    //đưa dữ liệu từ form vào database
    public function add(Request $req)
    {
        //validate form
        $this->validate(
            $req,
            [
                'name' => 'required|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'tên không được để trống',
                'email.required' => 'email không được để trống',
                'email.email'=>'email không đúng định dạng',
                'password.required' => 'mật khẩu không được để trống',
                'name.unique' => 'tên đã tồn tại',
                'email.unique' => 'email đã tồn tại'
            ]
        );
        // mã hóa mật khẩu
        $password = bcrypt('$req->password');

        Account::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $password
        ]);
        return redirect()->route('themtk');
    }
    //lấy dữ liệu từ databe ra danh sách sản phẩm
    public function list()
    {
        $users = Account::all();
        return view('admin.account.listaccount', [
            'user' => $users
        ]);
    }
    //xóa sản phẩm
    public function delete($id)
    {
        Account::destroy($id);
        return redirect()->route('dstk');
    }
    //sửa sản phẩm
    public function edit($id)
    {
        $sua = Account::find($id);
        return view('admin.account.editaccount', [
            'edit' => $sua
        ]);
    }
    public function update($id, Request $req)
    {
        //validate form
        //  $this -> validate($req,
        //  [
        //      'name'=> 'required|unique:Sanpham,name,'.$id,//'.$id' là để cho phép trùng
        //      'slug'=> 'required|unique:Sanpham,slug,'.$id,
        //      'gia' => 'required,'.$id,
        //      'hinhsp' => 'required|unique:Sanpham,hinhsp,'.$id,
        //      'mota' => 'required,'.$id
        //  ],
        //  [
        //      'name.required' => 'tên sản phẩm không được để trống',
        //      'slug.required' => 'đường dẫn tĩnh không được để trống',
        //      'gia.required' => 'giá sản phẩm không được để trống',
        //      'hinhsp.required' => 'hình sản phẩm không được để trống',
        //      'mota.required' => 'mô tả sản phẩm không được để trống',
        //      'name.unique' => 'tên sản phẩm đã tồn tại',
        //      'slug.unique' => 'đường dẫn tĩnh đã tồn tại',
        //      'hinhsp.unique' => 'hình sản phẩm đã tồn tại'

        //  ]);
        Account::find($id)->update($req->all());
        return redirect()->route('dstk');
    }
}