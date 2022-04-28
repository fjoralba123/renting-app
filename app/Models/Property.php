<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'price',
        'type',
        'area',
        'image',
        'user_id',
        'startDate',
        'endDate',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class,"property_id","id");
    }
    public function reservations(){
        return $this->hasMany(Reservation::class,"property_id","id");
    }
}
