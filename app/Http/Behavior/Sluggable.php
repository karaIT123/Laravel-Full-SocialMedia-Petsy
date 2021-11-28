<?php

namespace App\Http\Behavior;

use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

trait Sluggable
{
    public function setSlugAttribute($slug)
    {
        if (isEmpty($slug)) {
            $this->attributes['slug'] = Str::slug($this->name);
        }
    }
}


