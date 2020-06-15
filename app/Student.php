<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //use SearchableTrait;

    protected $fillable = [
        'id',
        'FirstName',
        'LastName',
        'Maths',
        'Physics',
        'Chemistry',
    ];

    protected $searchable = [
        'users.name',
        'users.email',
        'users.email_verified_at' ,
        'users.password',
    ];
}
