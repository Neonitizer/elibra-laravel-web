<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_page() {
        return view('login');
    }

    public function login_process(Request $request) {
        $iduser = $request->input('iduser');
        $data = Pengguna::getUser($iduser);

        if($data) {
            // Check if user exists and the password matches
            if ($iduser == $data['iduser'] && password_verify($request->input('userpassword'), $data['userpassword'])) {
                // Authentication successful
                // Kill all other sessions first before making an new one.
                session()->flush();
                session()->put('iduser', $data['iduser']);
                session()->put('username', $data['username']);
                session()->put('accesslevel', $data['accesslevel']);
                return redirect()->route('homepage');
            }
        return redirect()->route('login_page');
        } else {
            return redirect()->route('login_page');
        }
    }

    public function logout_process() {
        session()->flush();
        return redirect() -> route('login_page');
    }
}
