<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'user_id',
        'type',
        'is_approved',
        'speciality_id',
        'contact',
        'area_id',


    ];

    protected $casts = [
       'contact'=>'array'
    ];

    public function Calls(){
        return $this->hasMany(Call::class);
    }
    public function region (){
        return $this->belongsTo(Region::class);
    }
}
