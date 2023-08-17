<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Requestoring;

class CustomerSearch extends Component

{
    public $search;
    public $sort = 'ID_REQUESTORING';
    public $direction = 'desc';

    public function render()
    {
        $requestoring = Requestoring::where('NIT', 'like' . '%' . $this->search . '%')
            ->orwhere('DES_REQUESTORIG', 'like' . '%' . $this->search . '%')
            ->orwhere('DES_AREA', 'like' . '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();

    }
}
