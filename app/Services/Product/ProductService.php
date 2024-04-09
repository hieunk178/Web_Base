<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\CategoryProduct\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use File;

class ProductService implements ProductServiceInterface
{
    private $productRepository;
    private $categoryRepository;
    private $brandRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        BrandRepositoryInterface $brandRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }

    public function index($request, $status)
    {
        $count = $this->productRepository->count();
        if ($status == "del") {
            $list_act = [
                'restore' => "Hiển thị",
                'delete' => "Xóa vĩnh viễn"
            ];
            $search = $request->search;
            $products = $this->productRepository->getProduct("del", $search);
            return compact("products", "count", "list_act");
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Ẩn sản phẩm",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $this->productRepository->getProduct("active", $search);
            return compact("products", "count", "list_act");
        } else {
            if ($count['pro_remove'] != 0) {
                $list_act = [
                    'restore' => "Hiển thị",
                    'remove' => "Ẩn sản phẩm",
                    'delete' => "Xóa vĩnh viễn"
                ];
            } else {
                $list_act = [
                    'remove' => "Ẩn sản phẩm",
                ];
            }
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $products = $this->productRepository->getProduct("", $search);
            return compact("products", "count", "list_act");
        }
    }

    public function create()
    {
        $brands = $this->brandRepository->getBrandName();
        $cat_list = $this->categoryRepository->getCategoryName();
        return compact("brands", "cat_list");
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required|integer',
                'new_price' => 'integer',
                'quantity' => 'required|integer',
                'image' => 'mimes:jpg,png,gif,webp|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có đỗ dài lớn nhất là :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif',
                'integer' => ':attribute phải là số nguyên!',
            ],
            [
                'name' => 'Tên người dùng',
                'price' => 'Giá sản phẩm',
                'new_price' => 'Giá khuyến mại',
                'quantity' => 'Số lượng',
                'image' => 'Hình ảnh'
            ],

        );
        if (empty($request->file())) {
            $image = 'image_blank.jpg';
        } else {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("uploads"), $image);
        }
        $pathImage = '/uploads/' . $image;
        $product = [
            'product_code' => $request->input('product_code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'status' => !$request->input('status') ? 1 : 0,
            'hot' => $request->input('hot') ? 1 : 0,
            'image' => $pathImage,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ];

        $this->productRepository->createProduct($product);
        $key = "success";
        $value = "Thêm sản phẩm mới thành công!";
        return compact("key", "value");
    }

    function edit($id)
    {
        $cat_list = $this->productRepository->getCatProductName();
        $brands = $this->productRepository->getBrandName();
        $product = $this->productRepository->find($id);
        return compact('product', 'cat_list', 'brands');
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | string | max:255',
                'price' => 'required | integer',
                'new_price' => 'integer',
                'slug' => 'unique:products,slug,' . $id . ',id',
                'quantity' => 'required|integer',
                'image' => 'mimes:jpg,png,gif,webp|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có đỗ dài lớn nhất là :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif',
                'integer' => ':attribute phải là số nguyên!',
                'unique' => ':attribute đã tồn tại!'
            ],
            [
                'name' => 'Tên người dùng',
                'price' => 'Giá sản phẩm',
                'new_price' => 'Giá khuyến mại',
                'quantity' => 'Số lượng',
                'image' => 'Hình ảnh',
                'slug' => 'Slug',
            ],
        );
        $product = $this->productRepository->find($id);
        if (empty($request->file())) {
            $pathImage = $product->image;
        } else {
            if (File::exists(public_path('uploads/' . $product->image))) {
                File::delete(public_path('uploads/' . $product->image));
            }
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("uploads"), $image);
            $pathImage = '/uploads/' . $image;
        }
        $productUpdate = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'new_price' => $request->input('new_price'),
            'quantity' => $request->input('quantity'),
            'slug' => $request->input('slug'),
            'status' => !$request->input('status') ? 1 : 0,
            'hot' => $request->input('hot') ? 1 : 0,
            'image' => $pathImage,
            'product_detail' => $request->input('product_detail'),
            'cat_id' => $request->input('cat_id'),
            'brand_id' => $request->input('brand_id'),
        ];
        $this->productRepository->updateProduct($id, $productUpdate);
        $key = "success";
        $value = "Thêm sản phẩm mới thành công!";
        return compact("key", "value");
    }

    function remove($id)
    {
        $key = '';
        $value = '';
        if ($this->productRepository->removeProduct($id)) {
            $key = 'success';
            $value = "Vô hiệu hóa sản phẩm thành công!";
        } else {
            $key = 'danger';
            $value = "Vô hiệu hóa sản phẩm không thành công!";
        }
        return compact('key', 'value');
    }
    function restore($id)
    {
        $key = '';
        $value = '';
        if ($this->productRepository->restoreProduct($id)) {
            $key = 'success';
            $value = "Khôi phục sản phẩm thành công!";
        } else {
            $key = 'danger';
            $value = "Khôi phục sản phẩm không thành công!";
        }
        return compact('key', 'value');
    }

    function delete($id)
    {
        $key = '';
        $value = '';
        if ($this->productRepository->deleteProduct($id)) {
            $key = 'success';
            $value = "Xóa hoàn toàn sản phẩm thành công!";
        } else {
            $key = 'danger';
            $value = "Xóa hoàn toàn sản phẩm không thành công!";
        }
        return compact('key', 'value');
    }

    function action(Request $req)
    {
        $listcheck = $req->input('list_check');
        $key = "";
        $value = "";
        $key1 = "";
        $value1 = "";
        if ($listcheck != null) {
            if (!empty($listcheck)) {
                $act = $req->input('act');
                //Thực hiện hành động ẩn các sản phẩm có id trong list_check
                if ($act == "remove") {
                    Product::destroy($listcheck);
                    $key = "success";
                    $value = "Các tài khoản đã ẩn thành công!";
                    return compact("key", "value");
                }
                //Thực hiện hành động khôi phục các tài khoản có id trong list_check
                if ($act == 'restore') {
                    Product::onlyTrashed()
                        ->whereIn('id', $listcheck)
                        ->restore();
                    $key = "success";
                    $value = "Các sản phẩm đã được hiển thị lại!";
                    return compact("key", "value");
                }
                //Thực hiện hành động xóa các sản phẩm có id trong list_check
                if ($act == 'delete') {
                    Product::onlyTrashed()
                        ->whereIn('id', $listcheck)
                        ->forceDelete();
                    $key = "success";
                    $value = "Các sản phẩm đã được xóa hoàn toàn!";
                    $key1 = "alert";
                    $value1 = "success";
                    return compact("key", "value", "key1", "value1");
                }
            }
        }
    }
}
