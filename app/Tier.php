<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'job_id', 'industry_id', 'tier_number'
    ];

    public function industry()
    {
        return $this->hasOne('App\industry', 'id' ,'industry_id');
    }

    public function jobType()
    {
        return $this->hasOne('App\job_type', 'id' ,'job_id');
    }
    
    public function course()
    {
        return $this->hasOne('App\course', 'id','course_id');
    }
}
