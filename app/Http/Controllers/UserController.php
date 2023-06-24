<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.pasien');
        }

        return back()->withErrors([
            'wrong' => 'Email atau Password anda salah!',
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function register_dokter()
    {
        return view('register_dokter');
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
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        if ($request->password != $request->confirm_password) {
            return redirect()->back()->withInput()->withErrors([
                'wrong' => 'Password tidak sama!',
            ]);
        }

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->role = 'pasien';
        $user->save();

        return redirect()->route('login')->with('success', 'User berhasil ditambahkan!');
    }

    public function store_dokter(Request $request)
    {
        $request->validate([
            'ktp' => 'required',
            'sip' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        if ($request->password != $request->confirm_password) {
            return redirect()->back()->withInput()->withErrors([
                'wrong' => 'Password tidak sama!',
            ]);
        }

        // store image
        $file = $request->file('ktp');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);

        $file = $request->file('sip');
        $filename2 = $file->getClientOriginalName();
        $file->move(public_path('images'), $filename2);


        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->role = 'dokter';
        $user->ktp = $filename;
        $user->sip = $filename2;
        $user->save();

        return redirect()->route('login')->with('success', 'User berhasil ditambahkan!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
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
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('login')->with('success', 'User berhasil dihapus!');
    }
}
