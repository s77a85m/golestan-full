<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source' => 'title'
            ]
        ];
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }

    public function children()
    {
        return $this->hasMany(Unit::class, 'unit_id');
    }

    public function parent()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
