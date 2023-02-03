<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectUnit extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    protected $table = 'select_units';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function units_of_select_unit()
    {
        return $this->hasMany(UnitOfSelectUnit::class, 'selectUnit_id', 'id');
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }
}
