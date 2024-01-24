<?php

namespace App\Livewire\Ideas;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;

class EditComment extends Component
{
    public Comment $comment;

    #[Validate('required|min:3')]
    public $commentBody;
    public $commentUpdated = false;

    #[On('open-editcomment-modal')]
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
        $this->commentBody = $comment->body;
    }

    public function updateComment()
    {
        $this->authorize('update', $this->comment);
        $this->validate();
        $this->comment->body = $this->commentBody;
        $this->comment->save();
        $this->commentUpdated = true;

        $this->dispatch('comment-updated.' . $this->comment->id);
        $this->dispatch('success-message', message: 'Comment updated successfully.');
    }
    public function render()
    {
        return view('livewire.ideas.edit-comment');
    }
}
