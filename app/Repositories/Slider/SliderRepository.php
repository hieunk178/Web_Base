<?php

namespace App\Repositories\Slider;
use App\Models\Slider;
use App\Models\Sliders;

class SliderRepository 
{
    private Slider $slider;
    public function __construct(Slider $slider) 
    {
        $this->slider = $slider;
    }

    
    public function getAllSlider()
    {
        return $this->slider->get();
    }
}