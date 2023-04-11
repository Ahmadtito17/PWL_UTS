<?php

namespace App\Http\Controllers;

use App\Models\Lagu;
use App\Models\LaguModel;
use Illuminate\Http\Request;

class LaguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lagu = LaguModel::all();
        return view('lagu.lagu')
                    ->with('lagu', $lagu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lagu.create_lagu')
                    ->with('url_form', url('/lagu'));
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
            'judul' => 'required|string|max:50',
            'artis' => 'required|string|max:50',
            'genre' => 'required|string|max:30',
            'tanggal_rilis' => 'required|date'
        ]);

        $data = LaguModel::create($request->except(['_token']));
        return redirect('/lagu')
            ->with('success', 'Lagu Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function show(LaguModel $lagu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lagu = LaguModel::find($id);
        return view('lagu.create_lagu')
                    ->with('lagu', $lagu)
                    ->with('url_form', url('/lagu/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'artis' => 'required|string|max:50',
            'genre' => 'required|string|max:30',
            'tanggal_rilis' => 'required|date'
        ]);

        $data = LaguModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('lagu')
            ->with('success', 'Lagu Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lagu  $lagu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LaguModel::where('id', '=', $id)->delete();
        return redirect('lagu')
            ->with('success', 'Lagu Berhasil Dihapus');
    }
}
