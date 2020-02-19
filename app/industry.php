<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
