<?php

namespace App;

use App\Scopes\EnquiriesScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiries extends Model
{
    use SoftDeletes;

    public $table = 'enquiries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'gd1_grade',
        'gd1_sub',
        'gd2_grade',
        'gd2_sub',
        'gd3_grade',
        'gd3_sub',
        'gd4_grade',
        'gd4_sub',
        'time_zone',
        'declare_term',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new EnquiriesScope);
    }
}
