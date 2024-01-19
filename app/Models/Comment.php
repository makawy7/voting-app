<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $perPage = 8;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            if (auth()->check() && empty($comment->user_id)) {
                $comment->user_id = auth()->id();
            }
        });
    }
    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $this->attributes['user_id'] = auth()->id();
    // }
    // protected function userId(): Attribute
    // {
    //     return Attribute::set(fn () => auth()->id());
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
