<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        $users=User::latest()->get();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Category  $category
         * @return \Illuminate\Http\Response
         */
        public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('Користувач був вилучений');
    }

}
