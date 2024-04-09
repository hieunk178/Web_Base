<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Slider\SliderServiceInterface;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    private $sliderServiceInterface;
    public function __construct(SliderServiceInterface $sliderServiceInterface)
    {
        $this->sliderServiceInterface = $sliderServiceInterface;
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'slider']);
            return $next($request);
        });
    }

    public function index()
    {
        $sliders = $this->sliderServiceInterface->index();
        return view('admin.slider.index',  $sliders);
    }

    public function store(Request $request)
    {
        $result = $this->sliderServiceInterface->store($request);
        return redirect('admin/slider')->with($result);
    }

    function restore($id)
    {
        $slider = $this->sliderServiceInterface->restore($id);
        return redirect('admin/slider')->with($slider);
    }

    function remove($id)
    {
        $slider = $this->sliderServiceInterface->remove($id);
        return redirect('admin/slider')->with($slider);
    }

    function delete($id)
    {
        $slider = $this->sliderServiceInterface->delete($id);
        return redirect('admin/slider')->with($slider);
    }
}
