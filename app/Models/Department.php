<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employes()
    {
        return $this->hasMany('App\Models\Employe');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
