<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionParticipant;
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

    public function submitCompetition()
    {
        $data = CompetitionParticipant::create(request()->all());

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/competition'), $imageName);
            $data->image = $imageName;
            $data->save();
        }

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil submit kompetensi');
        } else {
            return ResponseFormatter::error('Gagal submit kompetensi');
        }
    }
}
