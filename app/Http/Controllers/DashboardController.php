<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\LoginRecord;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd($_GET['id']);
        $user = User::find($_GET['id']);
        $siswa = Siswa::find($_GET['id_siswa']);
        $guru = Guru::find($_GET['id_guru']);
        // $loginRecords = LoginRecord::where('user_id', $_GET['id'])->first();
        $loginSiswa = LoginRecord::where('user_id', $_GET['id_siswa'])->first();
        $loginGuru = LoginRecord::where('user_id', $guru->id_guru)->first();
        // // cek login record
        // // $ipAddress = $loginRecords->pluck('ip_address')->toArray();
        // // $userAgent = $request->header('User-Agent');
        // dd($loginRecords);
        
        if ($loginSiswa) {
            return view('pages.dashboard');
        } else if($loginGuru) {
            return view('pages.dashboard');
        }
    }
}
