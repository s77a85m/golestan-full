<?php

namespace App\Models\Client;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Grade;
use App\Models\Admin\Major;
use App\Models\Admin\Orientation;
use App\Models\Admin\Role;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['firstname', 'lastname']
            ]
        ];
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }
}
