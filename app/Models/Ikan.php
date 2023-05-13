<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama_ikan',
        'jenis_ikan',
     ];
}
