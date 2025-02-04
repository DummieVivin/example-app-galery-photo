<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Function untuk menampilkan data project
    public function index(){
        return view('admin.projects.index', [ //ini tadi gada s
            'pageTitle' => 'Project'
        ]);
    }
}
