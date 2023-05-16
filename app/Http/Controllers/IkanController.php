<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use Illuminate\Http\Request;

class IkanController extends Controller
{
    public function index()
    {
        $ikans = Ikan::all();

        return response()->json($ikans);
    }

    public function getById($id)
    {
        $ikans = Ikan::find($id);

        if (!$ikans) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($ikans, 200);
    }
}
