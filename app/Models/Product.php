<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProduct;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use SoftDeletes, HasSlug;
    protected $fillable = ['name', 'product_code', 'description', 'price', 'new_price', 'quantity', 'slug', 'status', 'hot', 'image', 'product_detail', 'cat_id', 'brand_id'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function getPrice()
    {
        if ($this->new_price > 0) {
            return number_format($this->new_price, 0, '.', ',').' VND';
        } else {
            return number_format($this->price, 0, '.', ',').' VND';
        }
    }
    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'cat_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
