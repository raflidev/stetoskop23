<?php

namespace App\Http\Controllers;

use App\Models\Prediksi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $user,
            ]
        );
    }

    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
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
        $data = User::where('id', $id)->first();
        $history = Prediksi::where('user_id', $id)->get();
        return view('user_show', ['data' => $data, 'history' => $history, 'user_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile', ['data' => Auth::user()->id]);
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
        ]);

        $user = User::find($id);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diupdate!');
    }

    public function change_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->withInput()->withErrors([
                'wrong' => 'Password salah!',
            ]);
        }

        if ($request->new_password != $request->confirm_password) {
            return redirect()->back()->withInput()->withErrors([
                'wrong' => 'Password tidak sama!',
            ]);
        }

        $user = User::find($id);
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diupdate!');
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


    // API

    public function login_api(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register_api_pasien(Request $request)
    {

        $rules = [
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users',
            'alamat' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                'status' => 'error',
                'error' => $validator->messages(),
            ];

            return response()->json(['validator_failed' => $response], 401);
        }


        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->role = 'pasien';
        $user->save();



        $token = Auth::guard('api')->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register_api_dokter(Request $request)
    {
        $rules = [
            'ktp' => 'required',
            'sip' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|unique:users',
            'alamat' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response = [
                'status' => 'error',
                'error' => $validator->messages(),
            ];

            return response()->json(['validator_failed' => $response], 401);
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

        $token = Auth::guard('api')->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout_api()
    {
        try {
            Auth::guard('api')->logout();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token is invalid',
            ], 401);
        }
    }

    public function refresh_api()
    {
        try {
            return response()->json([
                'status' => 'success',
                'user' => Auth::guard('api')->user(),
                'authorisation' => [
                    'token' => Auth::guard('api')->refresh(),
                    'type' => 'bearer',
                ]
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token is invalid',
            ], 401);
        }
    }

    public function getUserId($id)
    {
        $user = User::where('id', $id)->first();
        return response()->json(
            [
                'status' => 'success',
                'data' => $user,
            ]
        );
    }

    public function getAllPasien()
    {
        $user = User::where('role', 'pasien')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $user,
            ]
        );
    }

    public function getAllDokter()
    {
        $user = User::where('role', 'dokter')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $user,
            ]
        );
    }
}
