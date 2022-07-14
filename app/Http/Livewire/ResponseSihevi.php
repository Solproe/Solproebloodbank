<?php

namespace App\Http\Livewire;

use App\Http\Livewire\ClickEvent as LivewireClickEvent;
use Livewire\Component;
use Livewire\ClickEvent;

class ResponseSihevi extends Component
{

    public function render()
    {

        $event = new LivewireClickEvent();

        $data = $event->sihevi;

        return view('livewire.response-sihevi', compact('data'));
    }
}
