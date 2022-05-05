<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractiveMaps extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'map_id',
        'map_name',
        'map_type',
        'map_description',
        'map_options',
        'map_images',
        'is_active',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'map_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active'  => 'boolean',
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
    public $table = 'interactive_maps';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapCoordinates()
    {
        return $this->hasMany(InteractiveMapsCoordinates::class, 'map_id', 'map_id');
    }
}
