<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
    ];

}
