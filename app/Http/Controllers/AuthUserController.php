<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\LoginRecord;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function logged($type, $token, $id){
        $login_record = LoginRecord::where('user_id', $id)->where('token', $token)->first();
        if ($login_record) {
            $user = User::where('id_user', $id)->first();
            if ($type == 'guru' && $token == $login_record->token) {
                $guru = Guru::where('id_guru', $id)->first();
                if ($guru) {
                    session()->put('guru', $guru);
                    session()->put('user_type', 'guru');
                    return redirect()->route('dashboard');
                } else {
                    abort(404, 'ANDA TIDAK BISA LOGIN');
                }
            } else if ($type == 'siswa' && $token == $login_record->token) {
                $siswa = Siswa::where('id_siswa', $id)->first();
                if ($siswa) {
                    session()->put('siswa', $siswa);
                    session()->put('user_type', 'siswa');
                    return redirect()->route('dashboard');
                } else {
                    abort(404, 'ANDA TIDAK BISA LOGIN');
                }
            } else {
                abort(404, 'ANDA TIDAK BISA LOGIN');
            }
        } else {
            abort(404, 'ANDA TIDAK BISA LOGIN');
        }
    }
}
