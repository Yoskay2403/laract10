<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajar extends Model
{
    use HasFactory;
    protected $fillable = ['nama_peserta', 'detail_program'];
    protected $table = 'pengajar';
    public $timestamps = false;
}