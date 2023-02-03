<?php

namespace App\Models\Admin;

use App\Models\Client\Professor;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOfSelectUnit extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    protected $table = 'unit_of_select_units';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function selectUnit()
    {
        return $this->belongsTo(SelectUnit::class, 'selectUnit_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
