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
        // if(session()->has('user')){
        //     $user = User::where('id_user', session('user_id'))->first();
        //     // dd($user);
        //     return view('pages.dashboard', compact(['user']));
        // } elseif (session()->has('guru')) {
        //     $guru = Guru::where('id_guru', session('id_guru'))->first();
        //     return view('pages.dashboard', compact(['guru']));
        // } elseif (session()->has('siswa')) {
        //     $siswa = Siswa::where('id_siswa', session('id_siswa'))->first();
        //     return view('pages.dashboard', compact(['siswa']));
        // } else {
        //     abort(404, 'ANDA HARUS LOGIN DULU');
        // }

        return view('pages.dashboard');

    }

    // public function logged($type, $id){
    //     if($type == 'user'){
    //         $user = User::where('id_user', $id)->first();
    //         session()->put('user', $user);
    //         session()->put('user_id', $id);
    //         return redirect()->route('home', compact(['user']));
    //     }

    //     else if($type == 'siswa'){
    //         session(['type' => $type]);
    //         $user = Siswa::where('id_siswa', $id)->first();
    //         session()->put('user', $user->nama);
    //         session()->put('user_id', $id);
    //         return redirect()->route('home', compact(['user']));
    //     } else if($type == 'guru'){
    //         session(['type' => $type]);
    //         $user = Guru::where('id_guru', $id)->first();
    //         session()->put('user', $user->nama);
    //         session()->put('user_id', $id);
    //         return redirect()->route('home', compact(['user']));
    //     }
 
    //     else {
    //         return abort(404, 'NOT FOUND');
    //     }
    // }
}
