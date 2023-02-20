<?php

namespace App\Http\Controllers\Api;

use App\Models\SessionUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    protected $userRepo;

    function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(Request $request)
    {

        $response = $this->userRepo->register($request);
        return response()->json([
            $response
        ], $response['code']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $checkTokenExit = SessionUser::where('user_id', \auth()->id())->first();
            if(empty($checkTokenExit)){
                $userSession = SessionUser::create([
                    'token' => md5(uniqid(rand(), true)),
                    'refresh_token' => md5(uniqid(rand(), true)),
                    'token_expried'=> date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refresh_token_expried'=> date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => \auth()->id()
                ]);
            }else{
                $userSession = $checkTokenExit;
            }
            return response()->json([
                'code'=>200,
                'data'=>$userSession,
            ],200);
        }
        return response()->json([
            'code'=>401,
            'error'=> 'Email hoặc mật khẩu không chính xác!',
        ],401);
    }
}
