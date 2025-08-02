<?php

namespace App\Traits;

trait HasViews
{
    public function incrementViews()
    {
        $this->increment('views');
        return $this;
    }

    public function getFormattedViewsAttribute()
    {
        return number_format($this->views);
    }
}
