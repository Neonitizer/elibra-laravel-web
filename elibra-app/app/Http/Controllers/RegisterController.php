<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register_page() {
        return view('register');
    }

    public function register_process(Request $request)
    {
        // Validate the user's input
        if (
            empty($request->input('username')) ||
            empty($request->input('iduser')) ||
            empty($request->input('userpassword')) ||
            empty($request->input('userpassword2'))
        ) {
            return redirect()->route('register_page')->with('flash', 'Tidak ada data yang boleh kosong.');
        }
        if($this->isIduserUnique($request->input('iduser'))) {
            return redirect()->route('register_page')->with('flash', 'ID telah diambil.');
        }
        if($request->input('userpassword') != $request->input('userpassword2')) {
            return redirect()->route('register_page')->with('flash', 'Password tidak sama.');
        }

        // Create a new user
        Pengguna::insert([
            'username' => $request->input('username'),
            'iduser' => $request->input('iduser'),
            'userpassword' => Hash::make($request->input('userpassword')),
            'accesslevel' => 'user',
            'jumlahbuku' => 0,
        ]);

        // Redirect to the login page or any other page you desire
        return redirect()->route('login_page')->with('flash', 'Akun berhasil diregistrasi.');
    }

    private function isIduserUnique($iduser)
    {
        $existingUser = Pengguna::getUser($iduser);
        return !is_null($existingUser);
    }
}
