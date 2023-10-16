<?php

namespace Wjurry\RedParts\Observers;

use Illuminate\Support\Facades\Auth;
use Wjurry\RedParts\Models\RedpartsThemeSlider;

class RedpartsThemeSliderObserver
{
    public static function creating(RedpartsThemeSlider $slider)
    {
        $slider->created_by = Auth::id();
    }
}
