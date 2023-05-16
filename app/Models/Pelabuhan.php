<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    protected $fillable = ['nama', 'alamat', 'deskripsi'];

    public function ikans()
    {
        return $this->hasMany(Ikan::class, 'pelabuhan_id');
    }
}

