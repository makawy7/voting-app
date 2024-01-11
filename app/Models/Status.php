<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public static function getCount()
    {

        return Idea::query()
            ->selectRaw('count(*) as ideas')
            ->selectRaw("coalesce(status_id, 'total') as status_id")
            ->groupBy(DB::raw('status_id WITH ROLLUP'))
            ->get()
            ->pluck('ideas', 'status_id')
            ->toArray();
    }
}
