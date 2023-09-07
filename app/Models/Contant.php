<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contant extends Model
{
    use HasFactory;
    protected $fillable=['id','location','city','district','email','phone'];
}
