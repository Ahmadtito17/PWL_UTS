<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameModel;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gm = GameModel::all();
        return view('game.game')
            ->with('gm', $gm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create_game')
            ->with('url_form', url('/game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_game' => 'required|string|max:10|unique:game,kode_game',
            'nama_game' => 'required|string|max:30',
            'creator_game' => 'required|string|max:30',
            'harga_game' => 'required|string|max:30',
            'tahun_rilis' => 'required|date'
        ]);

        $data = GameModel::create($request->except(['_token']));

        return redirect('game')
            ->with('success', 'Game Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(GameModel $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gm = GameModel::find($id);
        return view('game.create_game')
            ->with('gm', $gm)
            ->with('url_form', url('/game/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_game' => 'required|string|max:10|unique:game,kode_game,'.$id,
            'nama_game' => 'required|string|max:30',
            'creator_game' => 'required|string|max:30',
            'harga_game' => 'required|string|max:30',
            'tahun_rilis' => 'required|date'
        ]);
        $data = GameModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('game')
            ->with('success', 'Game Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GameModel::where('id', '=', $id)->delete();
        return redirect('game')
            ->with('success', 'Game Berhasil Dihapus');
    }
}
