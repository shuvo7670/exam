<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_name',
        'employee_type_id',
        'address',
        'phone',
    ];
    public  function employee_type(){
        return $this->belongsTo(EmployeeType::class);
    }
}
