<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ikan;
use App\Models\Pelabuhan;
use App\Http\Resources\IkanResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class IkanController extends Controller
{
    public function ambilSemuaData(){
        $getIkan=DB::table('ikans')
        ->join('pelabuhans','ikans.id_pelabuhan','=','pelabuhans.id_pelabuhan')
        ->select(
            'ikans.image as image',
            'ikans.id_ikan as id_ikan',
            'ikans.nama_ikan as nama_ikan',
            'ikans.jenis_ikan as jenis_ikan',
            'ikans.tgl_tiba as tgl_tiba',
            'ikans.harga as harga',
            'pelabuhans.pelabuhan as pelabuhan',
            'ikans.keterangan as keterangan',
        )
        ->get();
        $ikans = Ikan::all();

        return new IkanResource(true,'Data berhasil diambil',$getIkan,200);
    }

    public function ambilDataSpesifik(int $id_ikan){
        $ikan = Ikan::find($id_ikan);
        if($ikan){
            return new IkanResource(true,'Data berhasil diambil',$ikan,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_ikan' => 'required',
            'jenis_ikan' => 'required',
            'keterangan' => 'required',
            'tgl_tiba' => 'required',
            'harga' => 'required',
            'id_pelabuhan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return new IkanResource(false, null, $validator->errors(),400);
        }
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/ikan', $image->hashName());
        $storagepath = 'http://localhost:8000/storage/ikans/';

        //create post
        $ikan = Ikan::create([
            'image' => $storagepath.$image->hashName(),
            'nama_ikan' => $request->nama_ikan,
            'jenis_ikan' => $request->jenis_ikan,
            'tgl_tiba' => $request->tgl_tiba,
            'harga' => $request->harga,
            'id_pelabuhan' => $request->id_pelabuhan,
            'keterangan' => $request->keterangan,
        ]);

        //return response
        return new IkanResource(true, 'Data Post Berhasil Ditambahkan!', $ikan, 200);
    }

    public function ubahData(Request $request,$id_ikan){
        $validator = Validator::make($request->all(), [
            'image' => $storagepath.$image->hashName(),
            'nama_ikan' => $request->nama_ikan,
            'jenis_ikan' => $request->jenis_ikan,
            'tgl_tiba' => $request->tgl_tiba,
            'harga' => $request->harga,
            'id_pelabuhan' => $request->id_pelabuhan,
            'keterangan' => $request->keterangan,
        ]);

        if($validator->fails()){
            return new IkanResource(false, null, $validator->errors(),400);
        }

        // upload image
        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/ikans', $image->hashName());

            //delete old image
            Storage::delete('public/ikans/'.$ikan->image);

            //set new image path
            $storagepath = 'http://localhost:8000/storage/ikans/';

            //update post with new image
            $update = Ikan::where('id_ikan',$id_ikan)->update([
                'image' => $storagepath.$image->hashName(),
                'nama_ikan' => $request->nama_ikan,
                'jenis_ikan' => $request->jenis_ikan,
                'tgl_tiba' => $request->tgl_tiba,
                'harga' => $request->harga,
                'id_pelabuhan' => $request->id_pelabuhan,
                'keterangan' => $request->keterangan,
            ]);

        } else {
            //update post without image
            $update = Ikan::where('id_ikan',$id_ikan)->update([
                'nama_ikan' => $request->nama_ikan,
                'jenis_ikan' => $request->jenis_ikan,
                'tgl_tiba' => $request->tgl_tiba,
                'harga' => $request->harga,
                'id_pelabuhan' => $request->id_pelabuhan,
                'keterangan' => $request->keterangan,
            ]);
        }

        $ikan = Ikan::find($id_ikan);

        //return response
        return new IkanResource(true, 'Data Post Berhasil Diubah!', $ikan,200);
    }

    public function hapusData($id_ikan){
        $ikan = Ikan::find($id_ikan);
        if($ikan){
            $ikan->delete();
            return new IkanResource(true,'Data berhasil dihapus',$ikan,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }
}