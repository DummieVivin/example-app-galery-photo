<?php

namespace App\Livewire;

use Livewire\Component;

class TombolRefresh extends Component
{
    public $message = '';
    public $btnRefreshOn = false;

    public function render()
    {
        return view('livewire.tombol-refresh');
    }

    //Membuat event click
    public function btnRefresh(){
        $this->btnRefreshOn=true;
    }
}
