<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use App\Models\Report;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory ,HasApiTokens;

    protected $table = 'users';

    protected $fillable =[

        'name',
        'lastname',
        'email',
        'password',
        'dni',
        'id_rol'
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'user_id', 'id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id');
    }

}
