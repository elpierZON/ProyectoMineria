<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   use HasFactory;

    protected $table = 'area';

    protected $primaryKey = 'id_area';

    protected $fillable = [
        'name',
        // otros campos si tienes
    ];

    // Un área puede tener muchos reportes
    public function reports()
    {
        return $this->hasMany(Report::class, 'area_id', 'id_area');
    }
}
