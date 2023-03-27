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
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_id');
    }
}
