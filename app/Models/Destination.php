<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destination';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
