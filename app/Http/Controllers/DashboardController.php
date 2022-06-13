<?php

namespace App\Http\Controllers;

use App\Models\LoginRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $loginRecords = LoginRecord::where('user_agent', $request->header('User-Agent'))->first();
        // cek login record
        // $ipAddress = $loginRecords->pluck('ip_address')->toArray();
        // $userAgent = $request->header('User-Agent');
        // dd($loginRecords);
        // auth
        
        $user = User::where('id', Auth::user()->id)->first();
        // dd($user);
        if ($user->type == 'siswa') {
            dd('login siswa');
            return view('welcome');
        } else if($user->type == 'guru') {
            dd('guru login');
            return view('welcome');
        }
    }
}
