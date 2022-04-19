<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'warranty_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'home_address',
        'city_address',
        'zip_code',
        'often_water',
        'knowledge_in_plant',
        'following_watering_guide',
        'was_resolved',
        'remarks',
        'images',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'warranty_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'following_watering_guide' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Allow timestamps
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    public $table = 'warranty';
}
