<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $fillable = ['nama', 'jenis_ikan', 'pelabuhan', 'deskripsi', 'gambar'];

    public function jenisIkan()
    {
        return $this->belongsTo(JenisIkan::class, 'jenis_ikan_id');
    }

    public function pelabuhan()
    {
        return $this->belongsTo(Pelabuhan::class, 'pelabuhan_id');
    }
}