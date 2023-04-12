<?php

namespace App\Http\Livewire\Providers;

use App\Models\Inventories\Town;
use App\Models\provider\Provider;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class ProvidersIndex extends Component
{

    use withPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'ID_STATE';
    public $direction = 'Desc';
    public $selectedEstado = null, $selectedMunicipio = null;
    public $towns = null;
    public $providers;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $states = state::all();
        $providers = Provider::all();
        /* $providers = Provider::where('name', 'LIKE', '%' . $this->search . '%')
        ->orwhere('tax_identification', 'LIKE', '%' . $this->search . '%') */
        /* ->orwhere('city', 'LIKE', '%' . $this->search . '%') */
        /*->orderby($this->sort, $this->direction)*/
        /* ->latest('id')
        ->paginate(10); */

        return view('livewire.providers.providers-index', compact('providers', 'states'));

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
