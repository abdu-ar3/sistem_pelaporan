<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JjRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd('Test');
        $jj_rusak = \App\Models\JjRusak::paginate(15);
        $filterKeyword = $request->get('jjrusak');

        if($filterKeyword){
        $jj_rusak = \App\Models\JjRusak::where('tugas_untuk', 'LIKE',
        "%$filterKeyword%")->orWhere('lokasi', 'like', '%'.$filterKeyword.'%')
        ->orWhere('atasan', 'like', '%'.$filterKeyword.'%')->paginate(10);
        }
        return view('jjrusak.index', ['jj_rusaks' => $jj_rusak]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('Test');
        return view('jjrusak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Validasi
        \Validator::make($request->all(), [
            "name" => "required|min:5|max:30",
            "lokasi" => "required|min:5|max:50",
            "tanggal" => "required|min:4|max:120",
            "tugas_untuk" => "required|min:4",
            "atasan" => "required",
        ])->validate();

        // New TBM
        $new_jjrusak = new \App\Models\JjRusak;

        $new_jjrusak->name = $request->get('name');
        $new_jjrusak->lokasi = $request->get('lokasi');
        $new_jjrusak->tanggal = $request->get('tanggal');
        $new_jjrusak->tugas_untuk = $request->get('tugas_untuk');
        $new_jjrusak->atasan = $request->get('atasan');

        if($request->file('image')){
        $file = $request->file('image')->store('avatars', 'public');
        $new_jjrusak->image = $file;
        }
        

        $new_jjrusak->save();
        return redirect()->route('jj_rusak.index')->with('status', 'Laporan
       successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('Test');
        $jj_rusak = \App\Models\Jjrusak::findOrFail($id);
        return view('jjrusak.detail', ['jj_rusak' => $jj_rusak]);
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
        // dd('Testing');
        $jj_rusak = \App\Models\JjRusak::findOrFail($id);
        $jj_rusak->delete();
        return redirect()->route('jj_rusak.index')->with('status', 'Jalan & Jembatan Data successfully deleted');
    }
}
