<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\CreatePlayerRequest;

/**
 * Class PlayersController
 * @package App\Http\Controllers
 */
class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Get all the expiring players
        $players = Player::all();
        return view('players/expiring', compact('players','teams'));
    }

    /**
 * Display a listing of the resource.
 *
 * @return Response
 */
    public function find()
    {
        // Get all the expiring players
        $players = Player::all();
        $teams = Team::all();
        return view('players/find', compact('players','teams'));
    }

    public function findDates(Request $request)
    {
        // Get all the expiring players
//        dd($request->date_start);
//        $players = Player::all();
        $players = Player::where('rego_start', '>=', Carbon::createFromFormat('Y/', $request->date_start)->toDateTimeString())
        ->where('rego_end', '<=', Carbon::createFromFormat('m/d/y', $request->date_end)->toDateTimeString());
//        dd($players);
        $teams = Team::all();
        return view('players/find', compact('players','teams'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function expiring()
    {
        // Get all the expiring players
        $players = Player::all();
        return view('players/expiring', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teams = Team::lists('name','id')->toArray();
        return view('players/new', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePlayerRequest  $request
     * @return Response
     */
    public function store(CreatePlayerRequest $request)
    {
        //
        $player = Player::create($request->all());
        $team = Team::find($player->team);
        $message = $player->first_name . " " . $player->last_name . " in " .  $team->name . " has been Created";

        return redirect('player/create')->with([
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
        $player = Player::find($id);
//        dd($player);
        $teams = Team::lists('name','id')->toArray();
        return view('players/edit', compact('teams', 'player'));
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
        //
        $player = Player::find($id);
        Player::destroy($id);
        $message = $player->first_name . " " . $player->last_name . " has been deleted";
        return redirect('team/' . $player->team . '/edit')->with([
            'flash_message' => $message
        ]);
    }
}
