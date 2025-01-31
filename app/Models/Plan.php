<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable=[
        'tour_id',
        'area_id',
        'date',
       'remarks',
        'as_planned',
    ];
    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}

