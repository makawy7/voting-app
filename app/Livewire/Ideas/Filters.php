<?php

namespace App\Livewire\Ideas;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Filters extends Component
{
    #[Url(as: 'category')]
    public $currentCategory = 'All';

    #[Url(as: 'filter')]
    public $filter = 'No Filter';

    #[Url()]
    public $search;
    public function updatedCurrentCategory()
    {
        $this->dispatch('category-filter', $this->currentCategory);
    }
    public function updatedFilter()
    {
        $this->dispatch('additional-filter', $this->filter);
    }
    public function updatedSearch()
    {
        $this->dispatch('search-filter', $this->search);
    }

    #[On('idea-created')]
    public function resetFilters()
    {
        $this->reset('currentCategory', 'filter', 'search');
    }

    public function render()
    {
        return view('livewire.ideas.filters', ['categories' => Category::all()]);
    }
}
