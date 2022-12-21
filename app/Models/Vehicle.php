<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'type_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_id',
        'user_id',
        'type_id',
        'year',
        'model',
        'version',
        'plate',
    ];
}
