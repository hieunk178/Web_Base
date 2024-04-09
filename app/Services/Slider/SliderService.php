<?php

namespace App\Services\Slider;

use App\Repositories\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;

class SliderService implements SliderServiceInterface
{
    private $sliderRepositoryInterface;
    public function __construct(
        SliderRepositoryInterface $sliderRepositoryInterface
    ) {
        $this->sliderRepositoryInterface = $sliderRepositoryInterface;
    }

    public function index()
    {
        $sliders = $this->sliderRepositoryInterface->getAllSlider();
        return compact('sliders');
    }

    public function store(Request $request)
    {
        $result = $this->sliderRepositoryInterface->create($request);
        $key = "";
        $value = "";
        if (empty($result)) {
            $key = "danger";
            $value = "Thêm silder không thành công!";
        } else {
            $key = "success";
            $value = "Đã thêm slider thành công!";
        }
        return compact("key", "value");
    }

    function restore($id)
    {
        $slider = $this->sliderRepositoryInterface->find($id);
        $key = "";
        $value = "";
        if ($slider) {
            $slider->restore();
            $key = "success";
            $value = "Hiển thị lại slider thành công!";
        } else {
            $key = "danger";
            $value = "Hiển thị lại slider không thành công!";
        }
        return compact("key", "value");
    }

    function remove($id)
    {
        $slider = $this->sliderRepositoryInterface->find($id);
        $key = "";
        $value = "";
        if ($slider) {
            $slider->delete();
            $key = "success";
            $value = "Đã ẩn slider thành công!";
        } else {
            $key = "danger";
            $value = "Ẩn slider không thành công!";
        }
        return compact("key", "value");
    }

    function delete($id)
    {
        $slider = $this->sliderRepositoryInterface->find($id);
        $key = "";
        $value = "";
        if ($slider) {
            $slider->forceDelete();
            $key = "success";
            $value = "Đã xóa slider thành công!";
        } else {
            $key = "danger";
            $value = "Xóa slider không thành công!";
        }
        return compact("key", "value");
    }
}