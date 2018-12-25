<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkhour extends Model
{
    protected $table ="workhours";

    protected $fillable = ['date', 'no_of_hours', 'hourly_rate', 'project_id', 'resource_id', 'note'];
}
