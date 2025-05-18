<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'user_id',
        'area_id',
        'title',
        'description',
        'report_type',
        'photo_evidence',
        'status',
    ];

    // Relación inversa con Usuario
    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id');
    }

    // Relación inversa con Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id_area');
    }
}
