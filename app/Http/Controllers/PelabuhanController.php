<?php

namespace App\Http\Controllers;

use App\Models\Pelabuhan;

class PelabuhanController extends Controller
{
    public function index()
    {
        $pelabuhans = Pelabuhan::all();

        return response()->json($pelabuhans);
    }

    public function getById($id)
    {
        $pelabuhan = Pelabuhan::find($id);

        if (!$pelabuhan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pelabuhan, 200);
    }
}
