<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('Test');
        $lapor = \App\Models\Lapor::paginate(15);
        return view('lapor.index', ['lapors' => $lapor]);
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
         // Validasi
        \Validator::make($request->all(), [
            "name" => "required|min:5|max:30",
            "dept" => "required|min:5|max:50",
            "judul" => "required|min:4|max:120",
            "isi_laporan" => "required|min:4",
            "progres" => "required",
        ])->validate();

        // New TBM
        $new_lapor = new \App\Models\Lapor;

        $new_lapor->name = $request->get('name');
        $new_lapor->dept = $request->get('dept');
        $new_lapor->judul = $request->get('judul');
        $new_lapor->isi_laporan = $request->get('isi_laporan');
        $new_lapor->progres = $request->get('progres');

        if($request->file('image')){
        $file = $request->file('image')->store('avatars', 'public');
        $new_lapor->image = $file;
        }

         if($request->file('asbuild_drawing')){
        $file = $request->file('asbuild_drawing')->store('avatars', 'public');
        $new_lapor->asbuild_drawing = $file;
        }

        $new_lapor->save();
        return redirect()->route('list_laporan')->with('status', 'Laporan
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
        // dd('test');
        $list_laporan = \App\Models\Lapor::findOrFail($id);
        return view('lapor.detail', ['list_laporan' => $list_laporan]);
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
        $list_laporan = \App\Models\Lapor::findOrFail($id);
        $list_laporan->delete();
        return redirect()->route('list_laporan')->with('status', 'List Laporan successfully deleted');
    }

    public function list_laporan(Request $request)
    {
        //  dd('Test');
        $list_laporan = \App\Models\Lapor::paginate(15);
        $filterKeyword = $request->get('lapor');

        if($filterKeyword){
        $list_laporan = \App\Models\Lapor::where('name', 'LIKE',
        "%$filterKeyword%")->orWhere('progres', 'like', '%'.$filterKeyword.'%')
        ->orWhere('dept', 'like', '%'.$filterKeyword.'%')->paginate(10);
        }

        return view('lapor.list_laporan', ['list_lapors' => $list_laporan]);
    }
}
