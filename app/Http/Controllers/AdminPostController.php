<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    //
    function index(){
        return view('admin.brand.show');
    }
}
