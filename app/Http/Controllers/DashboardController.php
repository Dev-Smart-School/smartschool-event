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
        $loginRecords = LoginRecord::all();
        // // cek login record
        // // $ipAddress = $loginRecords->pluck('ip_address')->toArray();
        // // $userAgent = $request->header('User-Agent');
        // dd($loginRecords);
        // // auth
        // $user = User::all();
        $user = User::where('id', $loginRecords->user_id)->first();
        dd($user);
        if ($user->id == $loginRecords->user_id && $user->type == 'siswa') {
            dd('login siswa');
            return view('welcome');
        } else if($user->id == $loginRecords->user_id && $user->type == 'guru') {
            dd('guru login');
            return view('welcome');
        }
        return view('pages.dashboard');
    }
}
