<?php

namespace App;

use App\Workhours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{   
    use SoftDeletes;

    protected $table ="projects";

    protected $fillable = ['project_name', 'project_price', 'status', 'completion_date', 'start_date', 'end_date'];

    protected $dates = ['deleted_at'];


    public function workhour(){

        return $this->hasMany('App\Workhours', 'id' );

    }

}
