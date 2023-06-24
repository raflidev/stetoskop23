@extends('layout.app')

@section('content')
<div>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img src="http://127.0.0.1:8001/img/logo.png" alt="" style="width: 100px; height:100px;">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if ($errors->first('wrong'))
                <div id="error" class="px-5 bg-red-500 text-white py-3 mb-5 rounded items-center">
                    {{ $errors->first('wrong') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 mb-5 rounded items-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="POST" action="{{route('login.action')}}">
                @csrf
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Email
                    </label>
                    <input  class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" type="text" name="email" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password">
                        Password
                    </label>
                    <input  class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
                </div>

                <div class="flex items-center justify-end mt-4">

                    <button class="ml-4 px-2 sm:rounded-lg bg-yellow-400 text-black-800 font-bold p-2 uppercase border-t border-b border-r" type="submit">
                        Log in
                    </button>
                </div>

                <div class="block mt-4 text-left">
                    <div>Belum punya akun? <a href="{{route('register')}}" class="text-ms underline">Register</a> </div>
                    <div>atau jika kamu Dokter <a href="register-dokter" class="text-ms underline">Register Dokter</a></div>
                    <!--  -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
