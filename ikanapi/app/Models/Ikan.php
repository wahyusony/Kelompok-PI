<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;

    protected $table = 'ikans';

    protected $primaryKey = 'id_ikan';

    protected $fillable = [
        'image',
        'nama_ikan',
        'jenis_ikan',
        'tgl_tiba',
        'harga',
        'id_pelabuhan',
        'keterangan',
    ];
}
