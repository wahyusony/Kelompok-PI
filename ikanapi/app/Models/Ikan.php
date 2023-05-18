<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama_ikan',
        'keterangan',
     ];
}
