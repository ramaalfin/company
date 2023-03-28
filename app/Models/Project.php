<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_id');
    }
    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'employe_id');
    }
}
