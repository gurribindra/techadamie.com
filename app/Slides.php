<?php

namespace App;

use App\Scopes\SlidesScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Slides extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'slides';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'url',
        'btn_text',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SlidesScope);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

}
