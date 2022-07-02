<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectDetails extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'project_details_id',
        'project_id',
        'images',
        'description',
        'title',
        'date',
        'location',
        'value',
        'category',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'project_details_id';

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
     * Project
     * @return HasOne
     */
    public function project()
    {
        return $this->hasOne(Projects::class, 'project_id', 'project_id');
    }
}
