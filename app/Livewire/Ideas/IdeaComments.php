<?php

namespace App\Livewire\Ideas;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class IdeaComments extends Component
{
    use WithPagination;
    public Idea $idea;

    #[Url(as: 'comment')]
    public $notificationCommentId;

    // public $targetComment;
    public function mount(Idea $idea)
    {
        $this->idea = $idea;

        if ($this->notificationCommentId) {
            $commentsIds = $this->idea->comments()->pluck('id');
            $perPage = (new Comment())->getPerPage();
            $commentIndes = $commentsIds->search($this->notificationCommentId);
            $page = (int)($commentIndes / $perPage) + 1;
            $this->gotoPage($page);
        }
    }

    #[On('comment-added')]
    public function commentAdded()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    #[On('comment-deleted')]
    public function commentDeleted()
    {
        $this->idea->refresh();
        $lastPage = $this->idea->comments()->paginate()->lastPage();
        if ((int) $this->getPage() > $lastPage) {
            $this->gotoPage($lastPage);
        }
    }

    public function render()
    {
        return view('livewire.ideas.idea-comments', [
            'comments' => $this->idea->comments()->with('user:id,name')->paginate()->withQueryString()
        ]);
    }
}
