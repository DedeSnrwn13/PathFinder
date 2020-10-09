<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use PDF;
use App\Pelamar;

class TalentSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = DB::table('pelamar')->paginate(3);
        /**$pelamar = Pelamar::all()->paginate(2);**/
        return view('employer.talent_search.talentsearch', compact('pelamar'));
    }

    public function kirim_pdf(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        $pdf = PDF::loadView('export.pelamarpdf',['pelamar'=>$pelamar]);
        return $pdf->stream('profile.pdf');
    }

    public function offer(Pelamar $pelamar)
    {

    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pelamar = DB::table('pelamar')
        ->where('nama', 'like', "%".$cari."%")
        ->orwhere('usia', 'like', "%".$cari."%")
        ->orwhere('pendidikan', 'like', "%".$cari."%")
        ->orwhere('alamat', 'like', "%".$cari."%")
        ->get();
        return view('employer\talent_search\talentsearch', compact('pelamar'));
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
        //
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
