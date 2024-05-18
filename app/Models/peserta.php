<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    use HasFactory;
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    protected $fillable = ['nama_peserta', 'id_program', 'usia_peserta', 'alamat', 'jenis_kelamin', 'ttl'];
    protected $table = 'peserta';
    public $timestamps = false;
}