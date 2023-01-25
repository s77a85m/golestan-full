<?php

namespace App\Models\Client;

use App\Models\Admin\Major;
use App\Models\Admin\Orientation;
use App\Models\Admin\Position;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
