<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games', compact('games'));
    }

    public function showAllGame()
    {
        $games = Game::all();
        return view('games/index', compact('games'));
    }

    public function create()
    {
        return view('games/create');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'judul' => 'required|string|min:15|max:255',
            'publisher' => 'required|string|min:5|max:30',
            'deskripsi' => 'required|string|min:30|max:200',
            'tahun_rilis' => 'required|integer|min:2012|max:2022'
        ]);


        // NAMBAH GAME KE DATABASE
        Game::create([
            'judul' => $request->judul,
            'publisher' => $request->publisher,
            'deskripsi' => $request->deskripsi,
            'tahun_rilis' => $request->tahun_rilis
        ]);

        return redirect('/games/manage')->with('success_status', 'Game berhasil ditambahkan');
    }

    public function edit($id)
    {
        $game = Game::findorFail($id);
        return view('games/edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        // VALIDASI
        $request->validate([
            'judul' => 'required|string|min:15|max:255',
            'publisher' => 'required|string|min:5|max:30',
            'deskripsi' => 'required|string|min:30|max:200',
            'tahun_rilis' => 'required|integer|min:2012|max:2022'
        ]);

        // UPDATE GAME KE TABLE GAME
        $game = Game::findOrFail($id);
        $game->update([
            'judul' => $request->judul,
            'publisher' => $request->publisher,
            'deskripsi' => $request->deskripsi,
            'tahun_rilis' => $request->tahun_rilis,
        ]);

        return redirect('/games/manage')->with('success_status', 'Game berhasil diedit');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect('/games/manage')->with('success_status', 'Game berhasil dihapus');
    }
}
