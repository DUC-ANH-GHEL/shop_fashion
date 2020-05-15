<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model{
    protected $table='users';
    protected $fillable=[
        'name', 'email','password'
    ];

    // public function scopeSearch($query){
    //   if(empty(request()->search)){
    //       return $query;
    //   }
    //   else{
    //       return $query->where('name','like','%'.request()->search.'%');
    //   }
    // }
}