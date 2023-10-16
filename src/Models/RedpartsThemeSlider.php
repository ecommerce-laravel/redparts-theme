<?php

namespace Wjurry\RedParts\Models;

use App\Models\Traits\Activatable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Wjurry\RedParts\Observers\RedpartsThemeSliderObserver;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $created_by
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 */
class RedpartsThemeSlider extends Model implements HasMedia
{
    use HasFactory,
        Activatable,
        InteractsWithMedia;

    protected static function boot()
    {
        parent::boot();

        static::observe(RedpartsThemeSliderObserver::class);
    }

    /**
     * User owns this slide
     *
     * @return BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background')
            ->singleFile()
            ->useDisk(env('MEDIA_STORAGE_DISK', 'public'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('responsive_1350')
            ->width(1350);

        $this->addMediaConversion('responsive_blurred_1350')
            ->width(1350)
            ->quality(20)
            ->blur(70);
    }
}