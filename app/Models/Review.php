<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['content',
  ];


    public function property(){
        return $this->belongsTo(Property::class,"property_id","id");
    }
}
