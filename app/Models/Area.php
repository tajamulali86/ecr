<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['name','region_id'];

    public function region(){
        return $this->belongsTo(Region::class); // Assuming Region model has a 'area_id' column
    }

    public function customers(){
        return $this->hasMany(Customer::class); // Assuming Customer model has an 'area_id' column
    }
}
