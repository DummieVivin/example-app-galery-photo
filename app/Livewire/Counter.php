<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment() {
        return $this->count++;
    }

    public function decrement() {
        return $this->count--;
    }
}
