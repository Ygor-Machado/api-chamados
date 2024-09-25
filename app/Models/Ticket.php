<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'departament_id',
        'title',
        'observation',
        'status',
        'solution',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}
