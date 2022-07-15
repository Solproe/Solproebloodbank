<?php

namespace App\Http\Livewire;

use App\Http\Requests\ConsultarDonante;
use Livewire\Component;
use Illuminate\Http\Request;

class ClickEvent extends Component
{
    public $identification;
    public $documenttype;
    public $event = false;
    
    public function render()
    {
        return view('livewire.click-event');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function VerConsulta(Request $id)
    {
        return view('consulta/Consulta');
    }

    public function invoking()
    {

        $this->emit('donor', $this->identification);

        $this->event = true;
    }
}
