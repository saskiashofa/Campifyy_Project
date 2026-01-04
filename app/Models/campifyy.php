<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campifyy extends Model
{
    protected $table = 'admin';
    protected $fillable = ['email', 'password'];
    // protected $guarded = ['id'];
}
