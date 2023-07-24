<?php

namespace App\Http\Livewire\Donors;

use Livewire\Component;

class ModalVaribleReport extends Component
{

    public $showingModal = false;

    /*  public $listeners = [
    'hideMe' => 'hideModal',
    ]; */

    public function render()
    {

        return view('livewire.donors.modal-varible-report');
    }

    /*  public function showModal()
    {
    $this->showingModal = true;
    } */

    /* public function hideModal()
{
$this->showingModal = false;
} */
}
