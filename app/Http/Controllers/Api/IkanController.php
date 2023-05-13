<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ikan;
use App\Http\Resources\IkanResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class IkanController extends Controller
{
    public function ambilSemuaPost(){
        $ikans = Ikan::all();
        return new IkanResource(true,'Data berhasil diambil',$ikans,200);
    }

    public function ambilPostSpesifik(int $id){
        $ikans = Ikan::find($id);
        if($ikans){
            return new IkanResource(true,'Data berhasil diambil',$ikans,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahPost(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_ikan' => 'required',
            'jenis_ikan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()){
            return new PostResource(false, null, $validator->errors(),400);
        }
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/ikan', $image->hashName());
        $storagepath = 'http://localhost:8000/storage/ikan/';

        //create post
        $post = Post::create([
            'image'     => $storagepath.$image->hashName(),
            'nama_ikan'     => $request->nama_ikan,
            'jenis_ikan'   => $request->jenis_ikan,
        ]);

        //return response
        return new IkanResource(true, 'Data Berhasil Ditambahkan!', $ikan, 200);
    }

    public function ubahPost(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'nama_ikan' => 'required',
            'jenis_ikan' => 'required',
        ]);

        if($validator->fails()){
            return new IkanResource(false, null, $validator->errors(),400);
        }

        // upload image
        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/ikan', $image->hashName());

            //delete old image
            Storage::delete('public/ikan/'.$ikan->image);

            //set new image path
            $storagepath = 'http://localhost:8000/storage/ikan/';

            //update post with new image
            $update = Ikan::where('id',$id)->update([
                'image'     => $storagepath.$image->hashName(),
                'nama_ikan'     => $request->nama_ikan,
                'jenis_ikan'   => $request->jenis_ikan,
            ]);

        } else {
            //update post without image
            $update = Ikan::where('id',$id)->update([
                'nama_ikan'     => $request->nama_ikan,
                'jenis_ikan'   => $request->jenis_ikan,
            ]);
        }

        $ikans = Ikan::find($id);

        //return response
        return new IkanResource(true, 'Data Berhasil Diubah!', $ikans,200);
    }

    public function hapusPost($id){
        $ikans = Ikan::find($id);
        if($ikans){
            $ikans->delete();
            return new IkanResource(true,'Data berhasil dihapus',$ikans,200);
        }else{
            return new IkanResource(false,'Data tidak ditemukan',null,404);
        }
    }
}
