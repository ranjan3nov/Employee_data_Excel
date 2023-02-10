<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeData extends Model
{
    use HasFactory;
    protected $fillable = [
        'empl_name',
        'father_name',
        'emp_number',
        'date_of_joining',
        'date_of_resign',
        'pf',
        'esic',
        'aadhar',
    ];
}
