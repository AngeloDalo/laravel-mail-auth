<?php

namespace App\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($name)
    {
        $slug = Str::slug($name, '-');

        $oldProject = Project::where('slug', $slug)->first();

        $counter = 0;
        while ($oldProject) {
            $newSlug = $slug . '-' . $counter;
            $oldProject = Project::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
