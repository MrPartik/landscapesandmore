<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractiveMapsCoordinates extends Model
{    /**
 * The attributes that are mass assignable.
 *
 * @var string[]
 */
    protected $fillable = [
        'cmap_id',
        'map_id',
        'lat',
        'long',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'cmap_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Allow timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    public $table = 'interactive_maps_coordinates';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function map()
    {
        return $this->hasOne(\InteractiveMaps::class, 'map_id', 'map_id');
    }
}
