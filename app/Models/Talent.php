<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Talent extends Model
{
    use HasFactory;

    protected $table = 'talent';
    protected $fillable = ['name', 'email', 'phone', 'area_of_interest', 'resume_path', 'message'];
}
