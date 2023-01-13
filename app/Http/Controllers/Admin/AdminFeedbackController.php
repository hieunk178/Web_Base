<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class AdminFeedbackController extends Controller
{
    function index(Request $request, $status = "")
    {
        //Lấy tất cả bình luận bao gồm cả những bình luận đã vô hiệu hóa
        $all_cmt = Comment::withTrashed();

        //Lấy tất cả bình luận đã vô hiệu hóa
        $cmt_remove = Comment::onlyTrashed();

        //Lấy tất cả bình luận đang hoạt động
        $cmt_active = Comment::all();
        //đếm số lượng bản ghi các bình luận theo trạng thái 
        $count = array(
            "all_pro" => $all_cmt->count(),
            "pro_remove" => $cmt_remove->count(),
            "pro_active" => $cmt_active->count(),
        );

        if ($status == "del") {
            $list_act = [
                'restore' => "Hiển thị",
                'delete' => "Xóa vĩnh viễn"
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $comments = $cmt_remove->paginate(10);
            //dd($users->total()); 
            return view("admin.feedback.list", compact("comments", "count", "list_act"));
        } else if ($status == "active") {
            $list_act = [
                'remove' => "Ẩn bình luận",
            ];
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $comments = Comment::paginate(10);
            // dd($users->total()); 
            return view("admin.feedback.list", compact("comments", "count", "list_act"));
        } else {
            if ($cmt_remove->count() != 0) {
                $list_act = [
                    'restore' => "Hiển thị",
                    'remove' => "Ẩn bình luận",
                    'delete' => "Xóa vĩnh viễn"
                ];
            } else {
                $list_act = [
                    'remove' => "Ẩn bình luận",
                ];
            }
            $search = "";
            if ($request->input('keyword'))
                $search = $request->input('keyword');
            $comments = $all_cmt->paginate(10);
            //dd($users->total()); 
            return view("admin.feedback.list", compact("comments", "count", "list_act"));
        }
    }
}
