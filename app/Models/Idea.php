<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function hasVoted(?User $user)
    {
        if (!$user) {
            return false;
        }
        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }

    public function vote(?User $user)
    {
        if (!$user) {
            return false;
        }
        // syncWithoutDetaching instead of attach - because of the brower's back button bug
        $this->votes()->syncWithoutDetaching($user);
    }
    public function unVote(?User $user)
    {
        if (!$user) {
            return false;
        }
        $this->votes()->detach($user);
    }
}
