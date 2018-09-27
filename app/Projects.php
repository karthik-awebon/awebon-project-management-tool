<?php

namespace App;

use App\Workhours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{   
    use SoftDeletes;

    protected $table ="projects";

    protected $fillable = ['project_name', 'project_price'];

    protected $dates = ['deleted_at'];


    public function projects(){

        return $this->hasOne('App\Projects', 'workhours_id');

    }

  

}
