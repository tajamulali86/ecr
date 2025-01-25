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
    public function employee()
{
    return $this->belongsTo(User::class, 'employee_id');
}
    public function jointwith()
{
    return $this->belongsTo(User::class, 'joint_id');
}
    public function Customer(){
        return $this->belongsTo(    Customer::class);
    }


}
