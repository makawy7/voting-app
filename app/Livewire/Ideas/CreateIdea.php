<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Livewire\Attributes\Validate;

class CreateIdea extends Component
{

    #[Validate('required|min:4')]
    public $title;

    #[Validate('required|min:4')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category = 1;

    public $currentUrl;

    public function mount()
    {
        $this->currentUrl = url()->current();
    }
    public function create()
    {
        if (auth()->check()) {
            $this->validate();
            Idea::create([
                'user_id' => auth()->user()->id,
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'description' => $this->description,
            ]);

            if ($this->currentUrl !== route('idea.index')) {
                session()->flash('success', 'Idea Created Successfully');
                $this->redirectRoute('idea.index', navigate: true);
            } else {
                $this->reset('title', 'description', 'category');
                $this->dispatch('idea-created');
                $this->dispatch('success-message', message: 'Idea created successfully.');
            }
        } else {

            abort(Response::HTTP_FORBIDDEN);
        }
    }
    public function render()
    {
        return view('livewire.ideas.create-idea', [
            'categories' => Category::all()
        ]);
    }
}
