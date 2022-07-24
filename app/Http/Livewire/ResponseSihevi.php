<?php

namespace App\Http\Livewire;

use App\Http\Livewire\ClickEvent as LivewireClickEvent;
use Livewire\Component;
use Livewire\ClickEvent;
use Nette\Utils\Strings;

class ResponseSihevi extends Component
{

    /* public $open = true; */
    

    protected $listeners = ['donor' => 'callFunction'];

    public function render()
    {

        return view('livewire.response-sihevi');
    }

}
