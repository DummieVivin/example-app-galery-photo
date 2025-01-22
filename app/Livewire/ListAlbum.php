<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Post;

class ListAlbum extends Component
{

    public $listAlbum = [];

    public function mount(){
        $this->getAllListAlbum();
    }

    public function render()
    {
        return view('livewire.list-album');
    }

    #[On('refresh-album')]
    public function getAllListAlbum(){
        //Query mengambil data dari table posts
        $this->listAlbum = Post::with(['images', 'likes'])->get();
        dd($this->listAlbum);
    }
}
