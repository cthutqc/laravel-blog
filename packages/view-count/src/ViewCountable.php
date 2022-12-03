<?php

namespace Cthutqc\ViewCount;

trait ViewCountable
{
    public function views()
    {
        return $this->morphMany(Viewed::class, 'countable');
    }

    public function viewCount()
    {
        $view = $this->views()->first();
        if(!$view) {
            $view = new Viewed();
            $this->views()->save($view);
        }

        $key = $view->countable_type . $view->countable_id;

        if (!\Session::has($key)) {
            $view->count++;
            $this->views()->save($view);
            \Session::put($key, 1);
        }
    }

    public function showViewCount()
    {
        return $this->views()->first()->count;
    }
}
