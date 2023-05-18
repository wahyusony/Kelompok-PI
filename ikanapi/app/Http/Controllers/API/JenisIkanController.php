<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisIkan;
use App\Http\Resources\JenisIkanResource;
use Illuminate\Support\Facades\Validator;

class JenisIkanController extends Controller
{
    public function index()
    {
        $jenis_ikans = JenisIkan::all();

        return new JenisIkanResource(true,'Data berhasil diambil',$jenis_ikans,200);
    }

    public function getById(int $id_jenis_ikan)
    {
        $jenis_ikan = JenisIkan::find($id_jenis_ikan);
        if($jenis_ikan){
            return new JenisIkanResource(true,'Data berhasil diambil',$jenis_ikan,200);
        }else{
            return new JenisIkanResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'jenis_ikan' => 'required',
            'keterangan' => 'required',
        ]);

        if($validator->fails()){
            return new JenisIkanResource(false, null, $validator->errors(),400);
        }

        $jenis_ikan = JenisIkan::create([
            'jenis_ikan'   => $request->jenis_ikan,
            'keterangan'   => $request->keterangan,
        ]);

         //return response
         return new JenisIkanResource(true, 'Data Berhasil Ditambahkan!', $jenis_ikan, 200);
    }   

    public function ubahData(Request $request,$id_jenis_ikan){
        $validator = Validator::make($request->all(), [
            'jenis_ikan' => 'required',
            'keterangan' => 'required',
        ]);

        if($validator->fails()){
            return new JenisIkanResource(false, null, $validator->errors(),400);
        }

        $update = JenisIkan::where('id',$id_jenis_ikan)->update([
            'jenis_ikan'   => $request->jenis_ikan,
            'keterangan'   => $request->keterangan,
        ]);

        $jenis_ikan = JenisIkan::find($id_jenis_ikan);

        //return response
        return new JenisIkanResource(true, 'Data Berhasil Diubah!', $jenis_ikan,200);

    }

    public function hapusData($id_jenis_ikan){
        $jenis_ikan = JenisIkan::find($id_jenis_ikan);
        if($jenis_ikan){
            $jenis_ikan->delete();
            return new JenisIkanResource(true,'Data berhasil dihapus',$jenis_ikan,200);
        }else{
            return new JenisIkanResource(false,'Data tidak ditemukan',null,404);
        }
    }
}

