<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import the DB facade

class Peminjaman extends Model
{
    public $timestamps = false;
    protected $table = 'tblpinjam';

    public static function getAllPinjaman() {
        $data = Peminjaman::get();

        return $data;
    }

    public static function getPinjaman($idbuku, $iduser) {
        $data = DB::table('tblpinjam')
            ->join('tblbuku', 'tblbuku.idbuku', '=', 'tblpinjam.idbuku')
            ->join('tbluser', 'tbluser.iduser', '=', 'tblpinjam.iduser')
            ->select('tblbuku.idbuku', 'tbluser.iduser')
            ->where('tblbuku.idbuku', $idbuku)
            ->where('tbluser.iduser', $iduser)
            ->get();
        return $data;
    }

    public static function getBooksOfUser($iduser) {
        $books = DB::table('tblPinjam')
        ->join('tblBuku', 'tblPinjam.idbuku', '=', 'tblBuku.idbuku')
        ->select('tblPinjam.tanggalpinjam', 'tblPinjam.kodepinjam', 'tblBuku.namabuku', 'tblBuku.idbuku', 'tblBuku.pengarang', 'tblBuku.genrebuku', 'tblPinjam.kembali')
        ->where('tblPinjam.iduser', $iduser)
        ->get();

        return $books;
    }

    public static function getBookFromUser($iduser, $kodepinjam) {
        
        $books = self::getBooksOfUser($iduser);
        // Find the specific borrowed book in the list of borrowed books
        $book = $books->where('kodepinjam', $kodepinjam)->first();
        return $book;
    }
}
