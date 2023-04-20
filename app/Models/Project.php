<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    public function departments()
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }
    public function employes()
    {
        return $this->belongsToMany('App\Models\Employe')->withTimestamps();
    }
}
