<?php

namespace App\Http\Controllers;

use App\Models\CategoryCompetition;
use App\Models\Competition;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $category = CategoryCompetition::all();
        if (session()->has('user')) {
            $user = User::where('id_user', session('user_id'))->first();
            return view('pages.competition.index', compact(['category', 'user']));
        } else {
            abort(404, 'ANDA HARUS LOGIN DULU');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_competition_id' => 'required',
            'category_id' => 'required',
            'image_url' => 'required',
            'daterange' => 'required',
        ]);

        $start_date = substr($request['daterange'],0,-13);
        $end_date = substr($request['daterange'],13);
        $dateTime1 = new DateTime($start_date);
        $dateTime2 = new DateTime($end_date);

        Competition::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'category_competition_id' => $request['category_competition_id'],
            'image_url' => $request['image_url'],
            'start_date' => $dateTime1,
            'end_date' => $dateTime2,
            'status' => 0,
        ]);

        return redirect()->route('competition.index')->with('success', 'Competition created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
