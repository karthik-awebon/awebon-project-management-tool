<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workhours extends Model
{
    protected $table ="workhours";

    protected $fillable = ['date', 'no_of_hours', 'hourly_rate', 'project_id' ];
}
