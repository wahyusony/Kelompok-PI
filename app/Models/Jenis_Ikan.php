<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisIkan extends Model
{
    protected $fillable = ['jenis_ikan'];

    public function ikans()
    {
        return $this->hasMany(Ikan::class, 'jenis_ikan_id');
    }
}
