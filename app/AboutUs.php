<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class AboutUs extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'about_us';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'order_by',
    ];

    protected static function boot()
    {
        parent::boot();

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
