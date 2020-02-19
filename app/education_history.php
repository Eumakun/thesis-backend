<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class education_history extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_id','course_id', 'school_id', 'date_graduated'
    ];

    public function course()
    {
        return $this->hasOne('App\course', 'id','course_id');
    }

    public function school()
    {
        return $this->hasOne('App\school', 'id', 'school_id');
    }
}
