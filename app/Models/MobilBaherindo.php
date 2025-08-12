<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobilBaherindo extends Model
{
    protected $fillable = [
        "nama_mobil",
        "harga_mobil",
        "km_mobil",
        "tahun_mobil",
        "gambar_mobil"
    ];
}
