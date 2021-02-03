<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'address',
        'phone_number',
        'department_id',
        'job_position',
        'salary'
    ];


    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
