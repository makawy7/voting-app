<?php

namespace App\Livewire\Ideas;

use App\Models\Category;
use Livewire\Component;

class EditIdea extends Component
{   
    
    public function render()
    {
        return view(
            'livewire.ideas.edit-idea',
            [
                'categories' => Category::all()
            ]
        );
    }
}
