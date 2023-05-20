<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    use HasFactory;

    protected $table = 'pelabuhans';

    protected $primaryKey = 'id_pelabuhan';

    protected $fillable = [
        'pelabuhan',
        'lokasi',
        'deskripsi',
    ];
}
