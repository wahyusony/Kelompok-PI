<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Ikan;
use App\Models\Pemasok;
use App\Http\Resources\TransaksiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function tampilSemuaTransaksi()
    {
        $getTransaksi=DB::table('transaksis')
        ->join('ikans','transaksis.id_ikan','=','ikans.id_ikan')
        ->join('pemasoks','transaksis.id_pemasok','=','pemasoks.id_pemasok')
        ->select(
            'ikans.id_ikan as id_ikan',
            'pemasoks.id_pemasok as id_pemasok',
            'transaksis.jumlah as jumlah',
            'transaksis.tgl_transaksi as tgl_transaksi',
        )
        ->get();
        $transaksis = Transaksi::all();

        return new TransaksiResource(true,'Data berhasil diambil',$getTransaksi,200);
    }

    public function tampilById(int $id_transaksi)
    {
        $transaksi = Transaksi::find($id_transaksi);
        if($transaksi){
            return new TransaksiResource(true,'Data berhasil diambil',$transaksi,200);
        }else{
            return new TransaksiResource(false,'Data tidak ditemukan',null,404);
        }
    }

    public function tambahData(Request $request){
        $validator = Validator::make($request->all(), [
            'id_ikan' => 'required',
            'id_pemasok' => 'required',
            'jumlah' => 'required',
            'tgl_transaksi' => 'required',
        ]);

        if($validator->fails()){
            return new TransaksiResource(false, null, $validator->errors(),400);
        }

        $transaksi = Transaksi::create([
            'id_ikan'   => $request->id_ikan,
            'id_pemasok'   => $request->id_pemasok,
            'jumlah'   => $request->jumlah,
            'tgl_transaksi'   => $request->tgl_transaksi,
        ]);

         //return response
         return new TransaksiResource(true, 'Data Berhasil Ditambahkan!', $transaksi, 200);
    }   

    public function updateData(Request $request,$id_transaksi){
        $validator = Validator::make($request->all(), [
            'id_ikan' => 'required',
            'id_pemasok' => 'required',
            'jumlah' => 'required',
            'tgl_transaksi' => 'required',
        ]);

        if($validator->fails()){
            return new TransaksiResource(false, null, $validator->errors(),400);
        }

        $update = Transaksi::where('id_transaksi',$id_transaksi)->update([
            'id_ikan'   => $request->id_ikan,
            'id_pemasok'   => $request->id_pemasok,
            'jumlah'   => $request->jumlah,
            'tgl_transaksi'   => $request->tgl_transaksi,
        ]);

        $transaksi = Transaksi::find($id_transaksi);

        //return response
        return new TransaksiResource(true, 'Data Berhasil Diubah!', $transaksi,200);

    }

    public function destroyData($id_transaksi){
        $transaksi = Transaksi::find($id_transaksi);
        if($transaksi){
            $transaksi->delete();
            return new TransaksiResource(true,'Data berhasil dihapus',$transaksi,200);
        }else{
            return new TransaksiResource(false,'Data tidak ditemukan',null,404);
        }
    }
}
