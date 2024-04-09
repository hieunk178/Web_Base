<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class FileController extends Controller
{
    public function __construct()
    {

    }

    public function index(){

    }

    public function upload(Request $request){
        $path = app('file.image')->upload($request->file('file'));
        return response()->json([
            'success' => true,
            'path' => $path
        ]);
    }
}
