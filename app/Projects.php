<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{   
    use SoftDeletes;

    protected $table ="projects";

    protected $fillable = ['project_name', 'project_price'];

    protected $dates = ['deleted_at'];
}
