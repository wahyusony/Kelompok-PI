<?php

namespace App\Http\Controllers;

use App\Models\JenisIkan;

class JenisIkanController extends Controller
{
    public function index()
    {
        $jenisIkan = JenisIkan::all();

        return response()->json($jenisIkan);
    }

    public function getById($id)
    {
        $jenisIkan = JenisIkan::find($id);

        if (!$jenisIkan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($jenisIkan, 200);
    }
}
