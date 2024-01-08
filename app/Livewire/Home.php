<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Idea;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home', [
            'ideas' => Idea::paginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
