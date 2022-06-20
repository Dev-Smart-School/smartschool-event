<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $data = Competition::all();

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil ambil data kompetensi');
        } else {
            return ResponseFormatter::error('Gagal ambil data kompetensi');
        }
    }
}
