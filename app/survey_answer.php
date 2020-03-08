<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class survey_answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','middle_name', 'last_name','address','age','employment_status','gender', 'birth_date'
    ];

    public function setAgeAttribute($value) {
        $this->attributes['age'] = Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function latestEmployment(){
        return $this->hasOne('App\employment_history', 'survey_id','id')->orderBy('id','desc');
    }

    public function latestEducation()
    {
        return $this->hasOne('App\education_history', 'survey_id','id')->orderBy('id','desc');
    }

    public function education()
    {
        return $this->hasMany('App\education_history', 'survey_id','id');
    }

    public function employment()
    {
        return $this->hasMany('App\employment_history', 'survey_id','id');
    }
}
