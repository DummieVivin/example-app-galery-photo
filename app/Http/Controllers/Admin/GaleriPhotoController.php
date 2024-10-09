<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GaleriPhotoController extends Controller
{
    public function index(){
        //dd('ini untuk ke admin');
        // dd(Post::all());
        $listPost = Post::all();
        return view('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-photo',
            'listPost'  => Post::all(),
        ]);
    }

    public function create(){
        // dd('rencana akan ke admin-create-galeri-photo');

        // dd(Category::categories);
        return view('admin.galeri-photo.create',[
            'pageTitle' => 'Create Galeri',
            'listCategory' => Category::categories
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'       => 'required',
            'category'    => 'required',
            'description' => 'required'
        ],[
            'title.required'       => 'Judul wajib di isi',
            'description.required' => 'Deskripsi wajib di isi'
        ]);
        // dd($validated);
        $post = Post::create([
            'title'      => $validated['title'],
            'category'   => $validated['category'],
            'description'=> $validated['description'],
            'slug'       => Str::slug($validated['title']),
            'user_id'    => Auth::user()->id
        ]);
        // dd($post);
        return redirect(route('admin-galeri-photo', absolute: false));
    }

    public function edit(string $slug){
        $post = Post::where('slug', $slug)->first();
        // $post = Post::findOrfail($postId);
        // //Mengembalikan ke halaman view admin
        return  view('admin.galeri-photo.edit',[
            'pageTitle'    => 'Edit Album',
            'post'         => $post,
            'listCategory' => Category::categories
        ]);
        // dd('alamat mau edit galeri photo', $post);
        // dd($slug);
    }
}
