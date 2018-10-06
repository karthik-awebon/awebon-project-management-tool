<?php

namespace App;

use App\Projects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workhours extends Model
{
    use SoftDeletes;

    protected $table ="workhours";

    protected $fillable = ['date', 'no_of_hours', 'hourly_rate', 'project_id'];

    protected $dates = ['deleted_at'];

    
    public function project(){

        return $this->hasOne('App\Projects','id','project_id');

    }
}