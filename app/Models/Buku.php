<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $timestamps = false;
    protected $table = 'tblbuku';

    public static function getAllBook() {
        //SELECT * FROM tblBuku ORDER BY namabuku ASC
        $data = Buku::orderBy('namabuku','asc')->get();

        return $data;
    }

    public static function getBook($idbuku) {
        //SELECT * FROM tblBuku WHERE idbuku = $idbuku
        $data = Buku::where('idbuku', $idbuku)->first();

        return $data;
    }
}
