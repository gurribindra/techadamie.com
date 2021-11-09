<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Edupro extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'edupro';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

    }

}
