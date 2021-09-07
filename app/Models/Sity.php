<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sity extends Model
{
    use HasFactory;
    protected $fillable = ['en_sity_name','ru_sity_name','arm_sity_name','country_id'];
}
