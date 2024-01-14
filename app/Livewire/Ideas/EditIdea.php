<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Gate;

class EditIdea extends Component
{
    public Idea $idea;

    #[Validate('required|min:4')]
    public $title;

    #[Validate('required|min:4')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category;

    // public bool $success = false;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    public function updateIdea()
    {
        // if (auth()->user()->cannot('update', $this->idea)) {
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // if (!Gate::allows('update', $this->idea)) {
        //     abort(Response::HTTP_FORBIDDEN);
        // }
        // Gate::authorize('update', $this->idea);
        $this->authorize('update', $this->idea);
        $this->validate();
        $this->idea->title = $this->title;
        $this->idea->description = $this->description;
        $this->idea->category_id = $this->category;
        $this->idea->save();

        $this->dispatch('idea-updated');
    }
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
