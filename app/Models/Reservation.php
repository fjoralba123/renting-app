<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['fullname','check_in','check_out','email','number_of_people','property_id','user_id',
  ];
  public function property(){
    return $this->belongsTo(Property::class,"property_id","id");
}
}
