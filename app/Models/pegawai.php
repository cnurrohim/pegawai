<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'hp', 'jeniskelamin', 'status'];

    public static function searchPegawai(Request $request){
        $search = $request->id;
        $data = Barang::select("nama","alamat","hp","jeniskelamin","status")
                            ->where("id",$search)
                            ->get();
        
        return $data;
    }
}
