<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
