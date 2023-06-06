<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts_count=Post::all()->count();

        $users_count=DB::table('model_has_roles')->where('role_id', '=', 1)->count();

        $admins_count=DB::table('model_has_roles')->where('role_id', '=', 2)->count();

        $phone=DB::table('users')->value('phone');

        return view('admin.home.index',
            [
                'posts_count'=>$posts_count,
                'users_count'=>$users_count,
                'admins_count'=>$admins_count,
                'phone'=>$phone,
            ]);

    }
}

