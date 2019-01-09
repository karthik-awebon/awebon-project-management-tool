<?php

namespace App;

use App\Workhours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;

    protected $table ="projects";

    protected $fillable = ['project_name', 'project_price', 'status', 'actual_completion_date', 'start_date', 'ETA'];

    protected $dates = ['deleted_at'];

    /* protected $dateFormat = 'd-m-Y'; */


    public function workhour()
    {
        return $this->hasMany('App\Workhours', 'id');
    }
}
