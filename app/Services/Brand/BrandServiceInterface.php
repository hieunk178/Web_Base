<?php

namespace App\Services\Brand;

use Illuminate\Http\Request;

interface BrandServiceInterface
{
    function index();
    function store(Request $req);
    function delete($id);
    function edit($id);
    function update(Request $req, $id);
}
