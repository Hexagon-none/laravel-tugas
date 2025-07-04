<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'tingkat',
        'wakes',
        'jumlah',
    ];
    public $incrementing = false;
}

