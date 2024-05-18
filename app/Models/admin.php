<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = ['username', 'password', 'admin_level'];
    public $timestamps = false;
}