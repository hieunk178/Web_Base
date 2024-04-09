<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CategoryProduct extends Model
{
    use SoftDeletes, HasSlug;
    protected $fillable = ['slug','name','description','image','id_parent'];
    protected $cats = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function getParent($parent = 0, $level = ''){
        $data = CategoryProduct::all()->where('id_parent', $parent);
        $level .= "-- ";
        if($data){
            foreach($data as $item){
                if($item->id_parent == 0){
                    $level = "";
                }
                $this->cats[$item->id] = $level.$item->name;
                $this->getParent($item->id, $level);
            }
        }
        return $this->cats;
    }

    public static function getCatName(){
        $data = CategoryProduct::all();
        $catName = [];
        foreach($data as $item){
            $catName[$item->id] = $item->name;
        }
        return $catName;
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }

    public function children()
    {
        return $this->hasMany(CategoryProduct::class, 'id_parent');
    }
}
