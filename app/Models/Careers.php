<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'careers_id',
        'name',
        'address',
        'email',
        'phone',
        'position_applying',
        'driver_license',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'careers_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
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
    public $table = 'careers';
}
