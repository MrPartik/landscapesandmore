<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Project;

class Projects extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'project_id',
        'project_type_id',
        'user_id',
        'url',
        'type',
        'thumbnail_url',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
     * Primary Key
     * @var string
     */
    protected $primaryKey = 'project_id';

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
     * Project Types
     * @return HasOne
     */
    public function projectType()
    {
        return $this->hasOne(ProjectTypes::class, 'project_type_id', 'project_type_id');
    }

    /**
     * User Created
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
