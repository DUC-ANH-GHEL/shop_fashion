<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class adminCategoryController extends Controller{
    public function index(){
        $cats = Category::all();
        return view('admin.category.addcategory',[
            'cats'=>$cats
        ]);
    }

    public function add(Request $req){
        $this -> validate($req,[
            'name'=>'required|unique:category,name',
            'slug'=>'required|unique:category,slug'
        ],[
            'name.required'=>'tên danh mục không được để trống',
            'name.unique'=>'tên danh mục đã tồn tại',
            'slug.required'=>'đường dẫn tĩnh không được để trống',
            'slug.unique'=>'đường dẫn tĩnh đã tồn tại'
        ]);
        Category::create([
            'name'=>$req->name,
            'slug'=>$req->slug,
            'parent'=>$req->parent
        ]);
        return redirect()->route('themdm');
    }
    public function list(Request $req){
        $cats = Category::paginate(5);
        $tong = Category::all();
        return view('admin.category.listcategory',[
            'cats'=>$cats,
            'tong'=>$tong
        ]);
    }

    public function delete($id){
        Category::destroy($id);
        return redirect()->back();
    }

    public function edit($id){
        $sua = Category::find($id);
        return view('admin.category.editcategory',[
            'sua'=>$sua,
            'cats'=>Category::where('id','<>',$id)->get() // xóa cái đang là
        ]);
    }

    public function update($id, Request $req){
        $this ->validate($req,[
            'name'=>'required|unique:category,name,'.$id, // .$id là để được trùng với cái cũ
            'slug'=>'required|unique:category,slug,'.$id

        ],[
            'name.required'=>'tên danh mục không được để trống',
            'name.unique'=>'tên danh mục đã tồn tại',
            'slug.required'=>'đường dẫn tĩnh không được để trống',
            'slug.unique'=>'đường dẫn tĩnh đã tồn tại'
        ]);
        Category::find($id)->update(
            //cách 1
        [
            'name'=>$req->name,
            'slug'=>$req->slug,
            'parent'=>$req->parent
        ]
            //cách 2, nhanh hơn
                // $req->all()


        );
        return redirect()->route('dsdm');
    }
}