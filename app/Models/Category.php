<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'ru_name',
        'en_name',
        'arm_name',
        'ru_title',
        'en_title',
        'arm_title',
        'ru_description',
        'en_description',
        'arm_description',
    ];
}
