<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GaleriPhotoController extends Controller
{
    public function index(){
        //dd('ini untuk ke admin');
        // dd(Post::all());
        //Menampilkan isi data post dan images
        // $listPost = Post::all();
        // $posts = Post::with('images')->get();

        // dd($posts);

        return view('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-photo',
            'listPost'  => Post::with('images')->get(),
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
            'description' => 'required',
            'images'      => 'required',
            'images.*'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.required'       => 'Judul wajib di isi',
            'description.required' => 'Deskripsi wajib di isi',
            'images.required'      => 'Photo Album Galeri Photo wajib di isi'
        ]);
        // dd($validated);
        $post = Post::create([
            'title'      => $validated['title'],
            'category'   => $validated['category'],
            'description'=> $validated['description'],
            'slug'       => Str::slug($validated['title']),
            'user_id'    => Auth::user()->id
        ]);

        if($validated['images']){
            foreach($request->file('images') as $file){
                if($file->isValid()){

                    // Mengambil Nama Original File
                    $originalName = $file->getClientOriginalName();

                    // Penambahan time dan _ untuk membuat unik
                    $uniqueName = time() .  '_' . $originalName;

                    //Menggunakan store membuat nama file unik
                    // $path = $file->store('images', 'public');

                    //Menimpan data dnegan nama original
                    $path = $file->storeAs('images',$uniqueName, 'public');
                    Image::create([
                        'name'    => $originalName,
                        'post_id' => $post->id,
                        'path'    => $path,
                    ]);
                }
            }
        }

        return redirect(route('admin-galeri-photo', absolute: false));
    }

    public function edit(Request $request, string $slug){
        // $post = Post::where('slug', $slug)->first();
        // $post = Post::findOrfail($postId);
        $post = Post::with('images')->where('slug', $slug)->first();

        // Mengembalikan ke halaman view admin
        return  view('admin.galeri-photo.edit',[
            'pageTitle'    => 'Edit Album',
            'post'         => $post,
            'images'       => $post->images,
            'listCategory' => Category::categories
        ]);
        // dd('alamat mau edit galeri photo', $post);
        // dd($slug);
    }

    public function show(Post $post){
        $album = Post::where('id', $post->id)->with('images')->first();
        return view('admin.galeri-photo.show' , [
            'pageTitle' => 'Show Galeri',
            'album'     => $post,
        ]);
    }

    public function destroy(Post $post){
        $album = Post::with('images')->find($post->id);
        foreach ($album->images as $image) {
            //Melakukan penghapusan file image di storage
            Storage::disk('public')->delete($image->path);
            //Menghapus objek file image dari table images
            $image->delete();
            // dd('Berhasil menghapus gambar yang di checklist');
        }

        $post->delete();
        return redirect(route('admin-galeri-photo', absolute: false))->with('status', 'deleted-successfuly');

    }

    public function updateGaleri(Request $request, Post $post){

       //Logic for Update
       $validated = $request->validate([
        'title'       => 'required',
        'category'    => 'required',
        'description' => 'required',
        'images'      => 'nullable',
        'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
        'title.required'       => 'Judul wajib di isi',
        'description.required' => 'Deskripsi wajib di isi',
        'images.required'      => 'Photo Album Galeri Photo wajib di isi'
        ]);

        $post->update([
            'title'      => $validated['title'],
            'category'   => $validated['category'],
            'description'=> $validated['description'],
            'slug'       => Str::slug($validated['title']),
            'user_id'    => Auth::user()->id
        ]);

        //Mengambil Request Input Image
        $checkBoxImages = Image::whereIn( 'id', $request->input('image') ??  [])->get();
        // dd($checkBoxImages);

        //Melakukan Looping untuk membongkar array checkBoxImages
        if($checkBoxImages){
            foreach ($checkBoxImages as $image) {
                //Melakukan penghapusan file image di storage
                Storage::disk('public')->delete($image->path);
                //Menghapus objek file image dari table images
                $image->delete();
                // dd('Berhasil menghapus gambar yang di checklist');
            }
        }

        //Jika ada request file image
        if ($request->hasFile('images')) {

            //Melakukan Looping / membongkar objek $images
            foreach ($request->file('images') as $file) {

                //Pengecekan valid file
                if ($file->isValid()){
                    //Ambil Original nama filenya
                    $originalName = $file->getClientOriginalName();

                    //Membuat nama file menjadi unik
                    $uniqueName = time() . '_' . $originalName;

                    //Menyimpan file ke storage disk public
                    $file->storeAs('public/images', $uniqueName);
                    }

                //Mengambil request file images
                foreach ($request->file('images') as $file){

                    //Membuat / Menyimpan gambar baru
                    if($file->isValid()){

                        // Mengambil Nama Original File
                        $originalName = $file->getClientOriginalName();

                        // Penambahan time dan _ untuk membuat unik
                        $uniqueName = time() .  '_' . $originalName;

                        //Menggunakan store membuat nama file unik
                        // $path = $file->store('images', 'public');

                        //Menimpan data dnegan nama original
                        $path = $file->storeAs('images',$uniqueName, 'public');
                        Image::create([
                            'name'    => $originalName,
                            'post_id' => $post->id,
                            'path'    => $path,
                        ]);
                    }

                }

                //Kembali ke alamat awal
                return redirect(route('admin-galeri-photo', absolute: false));
            }

        } else {
            //Kembali ke alamat awal
            return redirect(route('admin-galeri-photo', absolute: false));
        }
    }


}
