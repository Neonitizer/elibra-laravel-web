<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;

class HomeController extends Controller
{
    public function homepage() {
        return view('homepage');
    }
}
