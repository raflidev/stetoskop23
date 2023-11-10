<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('assign')->join('users', 'assign.user_id', '=', 'users.id')->join('users as dokter', 'assign.dokter_id', '=', 'dokter.id')->select('assign.id', 'users.nama_lengkap as pasien', 'dokter.nama_lengkap as dokter', 'assign.created_at')->get();
        // dd($data);
        $pasien = User::all()->where('role', 'pasien');
        $dokter = User::all()->where('role', 'dokter');
        $pasien_count = User::all()->where('role', 'pasien')->count();
        $dokter_count = User::all()->where('role', 'dokter')->count();

        $assigned_count = DB::table('assign')->count();
        $notassigned_count = DB::table('users')->where('role', 'pasien')->count() - $assigned_count;

        return view('assign.assign_index', ['data' => $data, 'pasien' => $pasien, 'dokter' => $dokter, 'pasien_count' => $pasien_count, 'dokter_count' => $dokter_count, 'assigned_count' => $assigned_count, 'notassigned_count' => $notassigned_count]);
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
        Assign::create([
            'user_id' => $request->user_id,
            'dokter_id' => $request->dokter_id,
        ]);
        return redirect()->route('assign.index')->with('success', 'Data berhasil ditambahkan');
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
