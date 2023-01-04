<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','product_code','short_des','price','new_price','quantity','image','description','cat_id']; 

    public function getPrice(){
        if($this->new_price == 0){
            return $this->price;
        }else{
            return $this->new_price;
        }
    }
}
