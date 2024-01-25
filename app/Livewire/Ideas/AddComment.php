<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use App\Notifications\CommentAdded;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddComment extends Component
{
    public Idea $idea;

    #[Validate('required|min:3')]
    public $comment;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function addComment()
    {
        if (!auth()->check()) {
            return $this->redirectRoute('login', navigate: true);
        }
        $this->validate();
        $comment = $this->idea->comments()->create([
            'body' => $this->comment
        ]);
        $this->reset('comment');
        $this->dispatch('comment-added', commentId: $comment->id);
        $this->dispatch('success-message', message: 'Comment was added.');

        $this->idea->user->notify(new CommentAdded($comment));
    }
    public function render()
    {
        return view('livewire.ideas.add-comment');
    }
}
