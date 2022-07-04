<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\LoginRecord;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function index(){
        // dd(session()->all());
        if (session('admin')) {
            return view('pages.dashboard');
        } else if(session('guru')) {
            return view('pages.dashboard');
        } else if(session('siswa')) {
            return view('pages.dashboard');
        } else {
            // abort(403, 'ANDA HARUS LOGIN DULU');
            return view('pages.dashboard');
        }

    }

}
