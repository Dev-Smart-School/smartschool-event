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
    // public function index(Request $request, $type, $id)
    // {
    //     if ($type == 'user') {
    //         $typeLogin = 'user';
    //         $data = User::where('id_user', $id)->first();
    //         return view('pages.dashboard', compact(['data', 'typeLogin']));
    //     } else if($type == 'guru') {
    //         $typeLogin = 'guru';
    //         $data = Guru::where('id_guru', $id)->first();
    //         return view('pages.dashboard', compact(['data','typeLogin']));
    //     } else if($type == 'siswa') {
    //         $typeLogin = 'siswa';
    //         $data = Siswa::where('id_siswa', $id)->first();
    //         return view('pages.dashboard', compact(['data','typeLogin']));
    //     } 
    // }

    public function index(){
        if(session()->has('user')){
            $id = session('user_id');
            $type = session('type');
            return redirect()->route('check-logged', ['type'=> $type, 'id' => $id]); 
        }
        
        return Redirect::to('https://home.sekolahandalan.id');
    }

    public function verify(Request $req){
        $credentials = $req->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);

        if(Auth::login($credentials)){
            $req->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logged($type, $id){
        if($type == 'user'){
            $user = User::where('id_user', $id)->first();
            session()->put('user', $user);
            session()->put('user_id', $id);
            return redirect()->route('home', compact(['user', 'type']));
        }

        else if($type == 'siswa'){
            session(['type' => $type]);
            $user = Siswa::where('id_siswa', $id)->first();
            session()->put('user', $user->nama);
            session()->put('user_id', $id);
            return redirect()->route('home', compact(['user', 'type']));
        } else if($type == 'guru'){
            session(['type' => $type]);
            $user = Guru::where('id_guru', $id)->first();
            session()->put('user', $user->nama);
            session()->put('user_id', $id);
            return redirect()->route('home', compact(['user', 'type']));
        }

        else {
            return abort(404, 'NOT FOUND');
        }
    }
}
