<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Destination::class);
    }
}
