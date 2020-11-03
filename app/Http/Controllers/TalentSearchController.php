<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Pelamar;
use App\Pendidikan;
use App\Pekerjaan;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;

class TalentSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamars = \App\Pelamar::paginate(3);
        $user = \App\User::find('id');


        /**$pelamar = Pelamar::all()->paginate(2);**/
        return view('employer.talent_search.talentsearch', compact('pelamars', 'user'));
    }

    public function kirim_pdf(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        // $pdf = PDF::loadView('pdf.invoice', $data);
        $pdf = PDF::loadView('export.pelamarpdf', ['pelamar'=>$pelamar]);
        return $pdf->download('profile.pdf');
    }

    public function offer(Pelamar $pelamar)
    {

    }

    public function cari(Request $request)
    {

        $cari = $request->cari;
        $pelamars = \App\Pelamar::where('nama', 'LIKE', '%'.$request->search.'%')
        ->orWhere('email', 'LIKE', '%'.$request->search.'%')
        ->orWhere('gender', 'LIKE', '%'.$request->search.'%')
        ->orWhere('agama', 'LIKE', '%'.$request->search.'%')
        ->orWhere('tempat_lahir', 'LIKE', '%'.$request->search.'%')
        ->orWhere('tanggal_lahir', 'LIKE', '%'.$request->search.'%')
        ->orWhere('pekerjaan_yang_akan_dilamar', 'LIKE', '%'.$request->search.'%')
        ->paginate(3);

        // $pendidikans = Pendidikan::where('nama_sekolah', 'like', "%".$cari."%")->paginate(3);

        return view('employer.talent_search.talentsearch', compact('pelamars'));
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
