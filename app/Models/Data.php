<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'name','email','Address','Age','state','Pic','DOB'       
    ];
    protected $table = 'data';
}
