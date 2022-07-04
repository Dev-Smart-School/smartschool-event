<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index()
    {
        $data = Podcast::all();

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil ambil data podcast');
        } else {
            return ResponseFormatter::error('Gagal ambil data podcast');
        }
    }

    public function store()
    {
        $data = Podcast::create(request()->all());

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil tambah data podcast');
        } else {
            return ResponseFormatter::error('Gagal tambah data podcast');
        }
    }
}
