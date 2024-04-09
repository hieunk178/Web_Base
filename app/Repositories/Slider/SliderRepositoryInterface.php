<?php

namespace App\Repositories\Slider;

use Illuminate\Http\Request;

interface SliderRepositoryInterface 
{
    public function find($id);
    public function getAllSlider();
    public function create(Request $request);
    public function getSliderShow();
}