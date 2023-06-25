<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Prediksi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('klasifikasi');
    }

    public function check_index()
    {
        $pasien = Assign::join('users', 'users.id', '=', 'assign.user_id')->where('dokter_id', Auth::user()->id)->get();
        return view('klasifikasi', ['pasien' => $pasien]);
    }

    public function run(Request $request)
    {
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        $http = new Client();
        $response = $http->post('http://127.0.0.1:5000/predict', [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($tujuan_upload . '/' . $nama_file, 'r'),
                ],
            ],
        ]);

        $response = json_decode($response->getBody());
        $prediksi = new Prediksi();
        if (Auth::user()->role == 'dokter') {
            $prediksi->user_id = $request->user_id;
        } else {
            $prediksi->user_id = Auth::user()->id;
        }
        $prediksi->suara = $nama_file;
        $prediksi->file_path = $tujuan_upload . '/' . $nama_file;
        $prediksi->jenis = "VHD";
        $prediksi->result = $response->hasil;
        $prediksi->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
