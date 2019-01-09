<?php

namespace App;

use App\Projects;
use App\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Workhours extends Model
{
    use SoftDeletes;

    use Sortable;

    protected $table ="workhours";

    protected $fillable = ['date', 'no_of_hours', 'hourly_rate', 'project_id', 'resource_id', 'note'];

    protected $dates = ['deleted_at'];

    public $sortableAs = ['date'];

    /*  protected $dateFormat = 'yyyy-mm-dd';
 */
    
    public function project()
    {
        return $this->hasOne('App\Projects', 'id', 'project_id');
    }
    public function resource()
    {
        return $this->hasOne('App\Resource', 'id', 'resource_id');
    }
}
