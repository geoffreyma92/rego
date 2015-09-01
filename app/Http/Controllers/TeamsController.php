<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTeamRequest;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team/index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        //Save teams to table
        $team = Team::create($request->all());
        $message = $team->name . " has been added";
        return redirect('team')->with([
            'flash_message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $team = Team::find($id);
        $players = Player::where('team', '=', $id)->get();
        // dd($players);
        return view('team/edit', compact('team', 'players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        Team::destroy($id);
        $message = $team->name . " has been deleted";
        return redirect('team')->with([
            'flash_message' => $message
        ]);
    }
}
