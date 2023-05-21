<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemasok;
use App\Http\Resources\PemasokResource;
use Illuminate\Support\Facades\Validator;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasoks = Pemasok::all();

        return new PemasokResource(true,'Data berhasil diambil',$pemasoks,200);
    }
        
    public function getById(int $id_pemasok)
    {
        $pemasok = Pemasok::find($id_pemasok);
        if($pemasok){
            return new PemasokResource(true,'Data berhasil diambil',$pemasok,200);
        }else{
            return new PemasokResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ]);

        if($validator->fails()){
            return new PemasokResource(false, null, $validator->errors(),400);
        }

        $pemasok = Pemasok::create([
            'nama_pemasok'   => $request->nama_pemasok,
            'alamat'   => $request->alamat,
            'kontak'   => $request->kontak,
        ]);

         //return response
         return new PemasokResource(true, 'Data Berhasil Ditambahkan!', $pemasok, 200);
    }   

    public function ubahData(Request $request,$id_pemasok){
        $validator = Validator::make($request->all(), [
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
        ]);

        if($validator->fails()){
            return new PemasokResource(false, null, $validator->errors(),400);
        }

        $update = Pemasok::where('id_pemasok',$id_pemasok)->update([
            'nama_pemasok'   => $request->nama_pemasok,
            'alamat'   => $request->alamat,
            'kontak'   => $request->kontak,
        ]);

        $pemasok = Pemasok::find($id_pemasok);

        //return response
        return new PemasokResource(true, 'Data Berhasil Diubah!', $pemasok,200);

    }

    public function hapusData($id_pemasok){
        $pemasok = Pemasok::find($id_pemasok);
        if($pemasok){
            $pemasok->delete();
            return new PemasokResource(true,'Data berhasil dihapus',$pemasok,200);
        }else{
            return new PemasokResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function getPemasok()
    {
        $pemasoks = Pemasok::all();
        return response()->json($pemasoks);
    }
}

