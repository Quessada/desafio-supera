<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'vehicle_id',
        'user_id',
        'date',
    ];
}