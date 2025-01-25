<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'date',
        'employee_id',
        'customer_id',
        'manager_id',
        'joint_id',
        'is_joint',
        'remarks'
    ];
    public function Products(){
        return $this->belongsToMany(Product::class);
    }
    public function User(){
        return $this->belongsTo(    User::class);
    }
    public function Customer(){
        return $this->belongsTo(    Customer::class);
    }


}
