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
        $data = Competition::with('category')->get();

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil ambil data kompetisi');
        } else {
            return ResponseFormatter::error('Gagal ambil data kompetisi');
        }
    }

    public function submitCompetition()
    {
        $data = CompetitionParticipant::create(request()->all());

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->move(public_path('images/competition'), $imageName);
            $data->image = $imageName;
            $data->save();
        }

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil submit kompetisi');
        } else {
            return ResponseFormatter::error('Gagal submit kompetisi');
        }
    }

    public function competitionParticipant($id)
    {
        $data = CompetitionParticipant::where('competition_id', $id)->get();

        if ($data) {
            return ResponseFormatter::success($data, 'berhasil ambil data kompetisi');
        } else {
            return ResponseFormatter::error('Gagal ambil data kompetisi');
        }
    }
}
