<?php

namespace App\Services\Slider;

use Illuminate\Http\Request;

interface SliderServiceInterface
{
    function index();
    function store(Request $request);
    function restore($id);
    function remove($id);
    function delete($id);
}