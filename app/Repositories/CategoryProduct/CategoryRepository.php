<?php

namespace App\Repositories\CategoryProduct;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryProduct\CategoryRepositoryInterface;
use App\Models\CategoryCategory;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryProduct;
use GuzzleHttp\Psr7\Request;
use Termwind\Components\Raw;

class CategoryRepository implements CategoryRepositoryInterface
{
    private CategoryProduct $cat;
    public function __construct(CategoryProduct $cat)
    {
        $this->cat = $cat;
    }

    public function count()
    {
        $count = [];
        $count['all_cat'] = $this->cat->withTrashed()->count();
        $count['cat_active'] = $this->cat->all()->count();
        $count['cat_remove'] = $this->cat->onlyTrashed()->count();
        return $count;
    }

    public function find($id)
    {
        $result = $this->cat->withTrashed()->find($id);

        return $result;
    }
    public function getCategory($where = "", $search)
    {
        $parentName = DB::raw("(SELECT 'name' FROM category_products WHERE category_products.id == id) as parent_name");
        $cats = DB::table('category_products')
            ->select(
                'id',
                'name',
                'image',
                'description',
                'image',
                $parentName,
                'deleted_at'
            )->get();
        dd($cats);
        if ($where == "active") {
            $cats->where('deleted_at', null);
        } elseif ($where == "remove") {
            $cats->where('deleted_at', '!=', null);
        }
        // dd($Categorys);
        return $cats->where('name', 'LIKE', "%{$search}%")->paginate(15);
    }
    public function createCategory($Category)
    {
        return $this->cat->create($Category);
    }
    public function updateCategory($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function removeCategory($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    public function restoreCategory($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->restore();

            return true;
        }

        return false;
    }


    public function deleteCategory($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->forceDelete();
            return true;
        }

        return false;
    }
    public function total()
    {
        return $this->cat->total();
    }
    public function getCatCategoryName()
    {
        return $this->cat->getParent();
    }
    public function getBrandName()
    {
        return DB::table('category_Categorys')->select('id', 'name')->get();
    }
}
