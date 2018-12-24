<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table ="resources";

    protected $fillable = ['resource_name', 'hourly_rate', 'email', 'password', 'role_id'];
}
