<?php

namespace App\Livewire\Ideas;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteComment extends Component
{
    public Comment $comment;

    #[On('open-deletecomment-modal')]
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function deleteComment()
    {
        $this->authorize('delete', $this->comment);
        $this->comment->delete();
        $this->dispatch('comment-deleted');
        $this->dispatch('success-message', message: 'Comment deleted successfully.');
    }
    public function render()
    {
        return view('livewire.ideas.delete-comment');
    }
}
