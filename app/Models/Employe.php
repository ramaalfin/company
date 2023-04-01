<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project')->withTimestamps();
    }
}
