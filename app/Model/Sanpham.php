<?php
namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model{
    protected $table='sanpham';
    protected $fillable=[
        'name', 'slug','gia','parent','hinhsp','mota'
    ];

    public function scopeSearch($query){
      if(empty(request()->search)){
          return $query;
      }
      else{
          return $query->where('name','like','%'.request()->search.'%');
      }
    }

    // public function category()
    // {
    //     return $this->hasOne('App\Category', 'id', 'parent');
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'parent', 'id');
    // }
}