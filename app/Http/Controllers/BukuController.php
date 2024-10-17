<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function book_list_page() {
        $buku = Buku::getAllBook();
        return view('home.daftarbuku')->with('books', $buku);
    }

    public function book_page($idbuku) {
        $book = Buku::getBook($idbuku);
        return view('home.buku', ['book' => $book]);
    }

    public function delete_book_process($idbuku) {
        if (session('accesslevel') != 'admin') {
            return redirect()->route('login_page');
        }
    
        Peminjaman::where('idbuku', $idbuku)->delete();
    
        Buku::where('idbuku', $idbuku)->delete();
    
        return redirect()->route('book_list_page');
    }

    public function add_book_page() {
        if(session('accesslevel') != 'admin')
        {
            return redirect()->route('login_page');
        }
        return view('home.tambahbuku');
    }

    public function add_book_process(Request $request) {
        if(session('accesslevel') != 'admin')
        {
            return redirect()->route('login_page');
        }
        if (
            empty($request->input('namabuku')) ||
            empty($request->input('idbuku')) ||
            empty($request->input('pengarang')) ||
            empty($request->input('genrebuku')) ||
            empty($request->input('ringkasan')) ||
            empty($request->input('tersediabuku'))
        ) {
            return redirect()->route('add_book_page')->with('flash', 'Error. Data tidak valid.');
        }
        if($this->isIdbookUnique($request->input('idbuku'))) {
            return redirect()->route('add_book_page')->with('flash', 'Error. ID buku sudah ada.');
        }
        // Create a new user
        Buku::insert([
            'namabuku' => $request->input('namabuku'),
            'idbuku' => $request->input('idbuku'),
            'pengarang' => $request->input('pengarang'),
            'genrebuku' => $request->input('genrebuku'),
            'ringkasan' => $request->input('ringkasan'),
            'tersediabuku' => $request->input('tersediabuku'),
        ]);
        return redirect()->route('add_book_page')->with('flash', 'Data berhasil ditambahkan.');
    }

    private function isIdbookUnique($idbuku)
    {
        $existingbook = Buku::getBook($idbuku);
        return !is_null($existingbook);
    }
}
