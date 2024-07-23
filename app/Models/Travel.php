<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travel';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
