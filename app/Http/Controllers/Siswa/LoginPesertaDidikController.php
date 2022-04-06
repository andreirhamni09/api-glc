<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginPesertaDidikController extends Controller
{
    public static function Login()
    {
        return view('peserta-didik.auth.login');
    }
}
