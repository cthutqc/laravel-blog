<?php

namespace Cthutqc\ViewCount;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Viewed extends Eloquent
{
    protected $table = 'view_counts';
    public $timestamps = false;
    protected $fillable = ['countable_id', 'countable_type', 'count'];

    public function countable()
    {
        return $this->morphTo();
    }
}
