<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'month',
        'approver_id',
        'is_approved',
        'remarks'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function approver(){
        return $this->belongsTo(User::class);
    }

    public function plans(){
        return $this->hasMany(Plan::class);
    }
}

