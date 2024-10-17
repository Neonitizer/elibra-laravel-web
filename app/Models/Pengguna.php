<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    public $timestamps = false;
    protected $table = 'tbluser';

    public static function getAllUser() {
        //SELECT * FROM tblUser
        $data = Pengguna::get();

        return $data;
    }

    public static function getUser($iduser) {
        //SELECT * FROM tblUser WHERE iduser = $iduser
        $data = Pengguna::where('iduser', $iduser)->first();

        return $data;
    }
}