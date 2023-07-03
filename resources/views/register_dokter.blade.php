@extends('layout.app')

@section('content')
    <div class="bg-gray-100 min-h-screen">
        <div>
            <a href="/">
                <img src="/images/logo.png" class="mx-auto h-20 pt-4" alt="">
            </a>
        </div>
        <div class="font-popins text-gray-900 antialiased flex justify-between">
            <div class="w-1/2">
                <div class="flex h-full">
                    <div class="m-auto">
                        <div class="w-[30rem] rounded-xl p-3 bg-orange-500 h-[30rem]"></div>
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    @if ($errors->first('wrong'))
                        <div id="error" class="px-5 bg-red-500 text-white py-3 mb-5 rounded items-center">
                            {{ $errors->first('wrong') }}
                        </div>
                    @endif
                    <div class="flex justify-end">
                        <div class="flex space-x-2 items-center">
                            <a href={{route('register')}} class="text-orange-500 font-medium py-2 px-5 rounded-full hover:text-white hover:bg-orange-500">Patient</a>
                            <a href={{route('register_dokter')}} class="text-white bg-orange-500 rounded-full font-medium py-2 px-5">Doctor</a>
                        </div>
                    </div>
                    <div class="text-orange-500 font-bold text-2xl pb-4">Register</div>
                    <form method="POST" enctype="multipart/form-data" action="{{route('register_dokter.action')}}" class="space-y-3">
                        @csrf
                        <div>
                            <label for="ktp">KTP</label>
                            <input type="file" id="ktp" name="ktp" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" >
                        </div>
                        <div>
                            <label for="sip">SIP</label>
                            <input type="file" id="sip" name="sip" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" >
                        </div>
                        <div>
                            <label for="nama_lengkap" class="block font-medium text-sm text-gray-700">Full Name</label>
                            <input type="text" value="{{old('nama_lengkap')}}" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="nama_lengkap" name="nama_lengkap">
                        </div>
                        <div>
                            <label for="alamat" class="block font-medium text-sm text-gray-700">Address</label>
                            <input type="text" value="{{old('alamat')}}" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="alamat" name="alamat">
                        </div>
                        <div>
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select id="gender" name="gender" value="{{old('gender')}}" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" value="{{old('email')}}" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" name="email">
                        </div>
                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" name="password">
                        </div>
                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                            <input type="password" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" name="confirm_password">
                        </div>

                        <div class="flex items-center justify-center mt-4">

                            <button class="px-16 rounded-full bg-orange-500 text-white font-bold py-3 uppercase" type="submit">
                                Register
                            </button>
                        </div>

                        <div class="block mt-4 text-center text-sm">
                            <div>Already Registered? <a href="{{route('login')}}" class="text-ms text-orange-500">Sign in here</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
