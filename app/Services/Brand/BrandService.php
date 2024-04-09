<?php

namespace App\Services\Brand;

use App\Repositories\Brand\BrandRepositoryInterface;
use Illuminate\Http\Request;
use File;

class BrandService implements BrandServiceInterface
{
    private $brandRepository;
    public function __construct(
        BrandRepositoryInterface $brandRepository
    ) {
        $this->brandRepository = $brandRepository;
    }

    function index()
    {
        $brands = $this->brandRepository->getAll();
        return compact('brands');
    }

    function store(Request $req)
    {
        $id = $req->input('update');
        $key = "";
        $value = "";

        if ($req->input('create') == null) {
            $req->validate(
                [
                    'name' => 'required|string|max:255',
                    'image' => 'mimes:jpg,png,gif,webp|max:20000',
                ],
                [
                    'required' => ':attribute không được bỏ trống!',
                    'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                    'mimes' => ':attribute chỉ được dùng file jpg, png, gif'
                ],
                [
                    'name' => 'Tên thương hiệu',
                    'image' => 'Ảnh minh họa',
                ],
            );
            $brand =
                [
                    'name' => $req->input('name'),
                    'description' => $req->input('description')
                ];
            if (empty($id)) {
                if (empty($req->file())) {
                    $brand['image'] = 'image_blank.jpg';
                } else {
                    $fileName = time() . '.' . $req->image->extension();
                    $req->image->move(public_path("uploads"), $fileName);
                    $brand['image'] = $fileName;
                }
                $this->brandRepository->createBrand($brand);
                $key = "success";
                $value = "Đã thêm một thương hiệu mới!";
                return compact("key", "value");
            } else {
                if (!empty($req->file())) {
                    $br = $this->brandRepository->find($id);
                    if (File::exists(public_path('uploads/' . $br->image))) {
                        File::delete(public_path('uploads/' . $br->image));
                    }
                    $fileName = time() . '.' . $req->image->extension();
                    $req->image->move(public_path("uploads"), $fileName);
                    $pathImage = "/uploads/" . $fileName;
                    $brand['image'] = $pathImage;
                }
                $this->brandRepository->updateBrand($id, $brand);
                $key = "success";
                $value = "Đã chỉnh sửa thương hiệu thành công!";
                return compact("key", "value");
            }
        } else {
            $key = "danger";
            $value = "Thương hiệu đã tồn tại(trùng khóa)!";
            return compact("key", "value");
        }
    }

    function edit($id)
    {
        $brand = $this->brandRepository->find($id);
        return compact("brand");
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'image' => 'mimes:jpg,png,gif,webp|max:20000',
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute có độ dài lớn nhất :max ký tự!',
                'mimes' => ':attribute chỉ được dùng file jpg, png, gif'
            ],
            [
                'name' => 'Tên thương hiệu',
                'image' => 'Ảnh minh họa',
            ],
        );
        $brand = $this->brandRepository->find($id);
        if (empty($request->file())) {
            $pathImage = $brand->image;
        } else {
            if (File::exists(public_path('uploads/' . $brand->image))) {
                File::delete(public_path('uploads/' . $brand->image));
            }
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("uploads"), $image);
            $pathImage = '/uploads/' . $image;
        }
        $brandUpdate = [
            'name' => $request->input('name'),
            'image' => $pathImage,
            'description' => $request->input('description'),
        ];
        $this->brandRepository->updateBrand($id, $brandUpdate);
        $key = "success";
        $value = "Update thành công!";
        return compact("key", "value");
    }

    function delete($id)
    {
        $brand = $this->brandRepository->find($id);
        $key = "";
        $value = "";
        if ($brand) {
            $brand->delete();
            $key = "success";
            $value = "Đã xóa thương hiệu thành công!";
        } else {
            $key = "danger";
            $value = "Không thể xóa thương hiệu không tồn tại!";
        }
        return compact("key", "value");
    }
}
