<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name', ];
    public $timestamps = false; // Disable timestamps
// public function employees()
// {
//     return $this->hasMany(Employee::class); // Assuming Employee model has a 'region_id' column
// }
public function customers()
{
    return $this->hasMany(Customer::class);
}

public function users()
{
    return $this->hasMany(User::class);
}

}
