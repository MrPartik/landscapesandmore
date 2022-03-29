<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTypes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'project_type_id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'project_type_id';

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
}
