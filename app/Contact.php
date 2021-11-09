<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Contact extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'contact';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'address',
        'phone_number',
        'email',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'youtube_link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

    }

}
