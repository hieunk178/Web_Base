<?php

namespace App\Services\Product;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    function index($request, $status);
    function create();
    function store(Request $request);
    function edit($id);
    function update(Request $request, $id);
    function remove($id);
    function restore($id);
    function delete($id);
    function action(Request $req);
}

