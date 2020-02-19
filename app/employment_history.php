<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employment_history extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_id','job_id', 'industry_id', 'job_description', 'date_resigned', 'date_employed'
    ];

    public function industry()
    {
        return $this->hasOne('App\industry', 'id' ,'industry_id');
    }

    public function jobType()
    {
        return $this->hasOne('App\job_type', 'id' ,'job_id');
    }
}
