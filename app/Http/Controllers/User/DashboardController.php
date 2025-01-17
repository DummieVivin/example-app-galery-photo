<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Post, Like};
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        return view('user.dashboard',[
            'pageTitle' => '-user',
            'posts'     => Post::with('images', 'likes')->get() //ini yang diubah
        ]);
    }

}
