<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function logged($type, $id){
        if($type == 'user'){
            $user = User::where('id_user', $id)->first();
            // Auth::login($user);
            // return $user;
            session()->put('user', $user->nama_lengkap);
            session()->put('id_user', $id);
            return redirect()->route('dashboard');
        }

        else if($type == 'siswa'){
            session(['type' => $type]);
            $user = Siswa::where('id_siswa', $id)->first();
            session()->put('user', $user->nama);
            session()->put('id_siswa', $id);
            return redirect()->route('dashboard');
        } else if($type == 'guru'){
            session(['type' => $type]);
            $user = Guru::where('id_siswa', $id)->first();
            session()->put('user', $user->nama_guru);
            session()->put('id_guru', $id);
            return redirect()->route('dashboard');
        }

        else {
            return abort(404, 'ANDA HARUS LOGIN DULU');
        }
    }
}
