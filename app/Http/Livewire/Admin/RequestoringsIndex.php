<?php

namespace App\Http\Livewire\Admin;

use App\Models\countriesstatestowns\states;
use App\Models\Inventories\Requestoring;
use App\Models\Inventories\Town;
use Livewire\Component;
use Livewire\WithPagination;

class RequestoringsIndex extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $sort = 'ID_STATE';
    public $direction = 'Desc';

    public $selectedEstado = null, $selectedMunicipio = null;
    public $towns = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $states = states::all();
        $requestorings = Requestoring::where('DES_REQUESTORIG', 'LIKE', '%' . $this->search . '%')
            ->orwhere('NIT', 'LIKE', '%' . $this->search . '%')
            ->orwhere('des_area', 'LIKE', '%' . $this->search . '%')
        /*->orderby($this->sort, $this->direction)*/
            ->latest('ID_REQUESTORIG')
            ->paginate(10);

        return view('livewire.admin.requestorings-index', compact('requestorings', 'states'));

    }

    public function updatedselectedEstado($ID_STATE)
    {
        $this->towns = town::where('ID_STATE', 'ID_STATE')->get();
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                ($this->direction == 'asc');
            } else {
                ($this->direction == 'desc');
            }
        } else {
            $this->sort = $sort;
        }

    }
}
