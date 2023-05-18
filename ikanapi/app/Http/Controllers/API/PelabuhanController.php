<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelabuhan;
use App\Http\Resources\PelabuhanResource;
use Illuminate\Support\Facades\Validator;

class PelabuhanController extends Controller
{
    public function tampilSemuaPelabuhan()
    {
        $pelabuhans = Pelabuhan::all();

        return new PelabuhanResource(true,'Data berhasil diambil',$pelabuhans,200);
    }

    public function tampilById(int $id_pelabuhan)
    {
        $pelabuhan = Pelabuhan::find($id_pelabuhan);
        if($pelabuhan){
            return new PelabuhanResource(true,'Data berhasil diambil',$pelabuhan,200);
        }else{
            return new PelabuhanResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'pelabuhan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return new PelabuhanResource(false, null, $validator->errors(),400);
        }

        $pelabuhan = Pelabuhan::create([
            'pelabuhan'   => $request->pelabuhan,
            'alamat'   => $request->alamat,
            'deskripsi'   => $request->deskripsi,
        ]);

         //return response
         return new PelabuhanResource(true, 'Data Berhasil Ditambahkan!', $pelabuhan, 200);
    }   

    public function updateData(Request $request,$id_pelabuhan){
        $validator = Validator::make($request->all(), [
            'pelabuhan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return new PelabuhanResource(false, null, $validator->errors(),400);
        }

        $update = Pelabuhan::where('id',$id_pelabuhan)->update([
            'pelabuhan'   => $request->pelabuhan,
            'alamat'   => $request->alamat,
            'deskripsi'   => $request->deskripsi,
        ]);

        $pelabuhan = Pelabuhan::find($id_pelabuhan);

        //return response
        return new PelabuhanResource(true, 'Data Berhasil Diubah!', $pelabuhan,200);

    }

    public function destroyData($id_pelabuhan){
        $pelabuhan = Pelabuhan::find($id_pelabuhan);
        if($pelabuhan){
            $pelabuhan->delete();
            return new PelabuhanResource(true,'Data berhasil dihapus',$pelabuhan,200);
        }else{
            return new PelabuhanResource(false,'Data tidak ditemukan',null,404);
        }
    }
}
