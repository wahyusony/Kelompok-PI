<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ikan;
use App\Http\Resources\IkanResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class IkanController extends Controller
{
    public function ambilSemuaData(){
        $asset=DB::table('ikans')
        ->join('jenis_ikans','ikans.id','=','jenis_ikans.id')
        ->join('pelabuhans','ikans.id','=','pelabuhans.id')
        ->select(
            'ikans.id as id',
            'ikans.nama_ikan as nama_ikan',
            'jenis_ikans.jenis_ikan as jenis_ikan',
            'pelabuhans.pelabuhan as pelabuhan',
            'ikans.keterangan as keterangan',
        )
        ->get();
        $ikans = Ikan::all();

        return new IkanResource(true,'Data berhasil diambil',$asset,200);
    }

    public function ambilDataSpesifik(int $id){
        $ikan = Ikan::find($id);
        if($ikan){
            return new IkanResource(true,'Data berhasil diambil',$ikan,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_ikan' => 'required',
            'keterangan' => 'required',
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
            'image'     => $storagepath.$image->hashName(),
            'nama_ikan'     => $request->nama_ikan,
            'keterangan'   => $request->keterangan,
        ]);

        //return response
        return new IkanResource(true, 'Data Post Berhasil Ditambahkan!', $ikan, 200);
    }

    public function ubahData(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'image'     => $storagepath.$image->hashName(),
            'nama_ikan'     => $request->nama_ikan,
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
            $update = Ikan::where('id',$id)->update([
                'image' => $storagepath.$image->hashName(),
                'nama_ikan' => $request->nama_ikan,
                'keterangan' => $request->keterangan,
            ]);

        } else {
            //update post without image
            $update = Ikan::where('id',$id)->update([
                'nama_ikan' => $request->nama_ikan,
                'keterangan' => $request->keterangan,
            ]);
        }

        $ikan = Ikan::find($id);

        //return response
        return new IkanResource(true, 'Data Post Berhasil Diubah!', $ikan,200);
    }

    public function hapusData($id){
        $ikan = Ikan::find($id);
        if($ikan){
            $ikan->delete();
            return new IkanResource(true,'Data berhasil dihapus',$ikan,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }
}