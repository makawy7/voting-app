<?php

namespace App\Livewire\Ideas;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;

class Filters extends Component
{
    #[Url(as: 'category')]
    public $category = 'All';
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function updatedCategory()
    {
        $categoryId = $this->categories->pluck('id', 'name')->get($this->category);
        $this->dispatch('category-filter', $categoryId);
    }
    public function render()
    {
        return view('livewire.ideas.filters', ['categories' => $this->categories]);
    }
}
