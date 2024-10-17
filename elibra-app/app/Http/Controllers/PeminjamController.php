<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pengguna;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{
    public function rules_page() {
        return view('home.peraturanpeminjaman');
    }

    public function borrower_list_page() {
        if(session('accesslevel') != 'admin')
        {
            return redirect()->route('login_page');
        }
        $users = Pengguna::getAllUser();
        return view('home.daftarpeminjam', ['users' => $users]);
    }

    public function user_detail($iduser) {
        if(session('accesslevel') != 'admin')
        {
            return redirect()->route('login_page');
        }
        $books = Peminjaman::getBooksOfUser($iduser);
        $user = Pengguna::getUser($iduser);
        return view('home.peminjam', ['user' => $user, 'books' => $books]);
    }

    public function user_book_remove($iduser, $kodepinjam) {
        if(session('accesslevel') != 'admin')
        {
            return redirect()->route('login_page');
        }
        $userbook = Peminjaman::getBookFromUser($iduser, $kodepinjam);

        // Update user book limit
        Pengguna::where('iduser', $iduser)->decrement('jumlahbuku');

        // Update book count
        Buku::where('idbuku', $userbook->idbuku)->increment('tersediabuku');

        Peminjaman:: where('kodepinjam', $userbook->kodepinjam)->update([
            'kembali' => 1,
        ]);

        return redirect()->route('user_detail', ['iduser' => $iduser])->with('flash', 'Berhasil melepas user dari buku.');
    }

    public function borrowing_history_page() {
        $iduser = session('iduser');
        $books = DB::table('tblPinjam')
        ->join('tblBuku', 'tblPinjam.idbuku', '=', 'tblBuku.idbuku')
        ->select('tblPinjam.tanggalpinjam', 'tblBuku.namabuku', 'tblBuku.idbuku', 'tblBuku.pengarang', 'tblBuku.genrebuku')
        ->where('tblPinjam.iduser', $iduser)
        ->get();
        return view('home.riwayatpeminjaman', ['books' => $books]);
    }

    public function borrowing_status_page() {
        $iduser = session('iduser');
        $userbook = Peminjaman::getBooksOfUser($iduser);

        return view('home.statuspeminjaman', ['userbook' => $userbook]);
    }

    public function choose_book_process($idbuku) {
        if(session('accesslevel') != 'user') {
            return redirect()->route('login_page');
        }
        $iduser = session('iduser');

        $user = Pengguna::getUser($iduser);
        $buku = Buku::getBook($idbuku);
        //Check if the user has already borrowed 5 books.
        if ($user->jumlahbuku >= 5) {
            return redirect()->route('book_page', ['idbuku' => $idbuku])->with('flash', 'Maaf, Anda sudah meminjam 5 buku. Anda tidak dapat meminjam lebih banyak.');
        }
        //Check if the book is available.
        if($buku->tersediabuku == 0) {
            return redirect()->route('book_page', ['idbuku' => $idbuku])->with('flash', 'Maaf, buku ini sedang tidak tersedia.');
        }

        //Insert data into tblPinjam
        Peminjaman::insert([
            'idbuku' => $buku->idbuku,
            'iduser' => $user->iduser,
            'kembali' => 0,
        ]);

        // Update user book limit
        Pengguna::where('iduser', $iduser)->increment('jumlahbuku');

        // Update book count
        Buku::where('idbuku', $idbuku)->decrement('tersediabuku');

        return redirect()->route('book_page', ['idbuku' => $idbuku])->with('flash', 'Berhasil meminjam buku. Mohon untuk mengambil buku melalui staff perpustakaan.');
    }
}


