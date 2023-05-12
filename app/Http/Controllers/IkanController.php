<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ikan;

class IkanController extends Controller
{
    public function index()
    {
        $ikanList = Ikan::all();
        return view('ikan', compact('ikanList'));
    }
    
    

    public function show($id)
    {
        $ikan = Ikan::find($id);

        if (!$ikan) {
            return response()->json(['message' => 'Ikan not found'], 404);
        }

        return response()->json($ikan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'pelabuhan' => 'required',
        ]);

        $ikan = Ikan::create($request->all());

        return response()->json($ikan, 201);
    }

    public function update(Request $request, $id)
    {
        $ikan = Ikan::find($id);
    
        if (!$ikan) {
            return response()->json(['message' => 'Data ikan tidak ditemukan'], 404);
        }
    
        $ikan->nama = $request->input('nama');
        $ikan->harga = $request->input('harga');
        $ikan->pelabuhan = $request->input('pelabuhan');
    
        $ikan->save();
    
        return response()->json($ikan, 200);
    }
    

    public function delete($id)
    {
        $ikan = Ikan::findOrFail($id);

        $ikan->delete();

        return response()->json(null, 204);
    }

    
    public function destroy($id)
    {
        $ikan = Ikan::find($id);

        if (!$ikan) {
            return response()->json(['message' => 'Ikan not found'], 404);
        }

        $ikan->delete();

        return response()->json(['message' => 'Ikan deleted']);
    }
}
