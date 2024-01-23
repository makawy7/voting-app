<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class IdeaComment extends Component
{
    public Comment $comment;
    public Idea $idea;
    public function mount(Comment $comment, Idea $idea)
    {
        $this->comment = $comment;
        $this->idea = $idea;
    }

    // #[On('comment-updated')]
    #[On('comment-updated.{comment.id}')]
    public function refreshComment()
    {
        $this->comment->refresh();
    }
    public function render()
    {
        return view('livewire.ideas.idea-comment');
    }
}
