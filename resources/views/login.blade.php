@extends('layout.app')

@section('content')
<div>
    <div class="font-popins text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-center bg-contain bg-no-repeat" style="background-image: url(/images/bg-login.png)">
            <div>
                <a href="/">
                    <img src="/images/logo.png" class="mx-auto w-4/6" alt="">
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
            <div class="text-orange-500 font-bold text-2xl pb-4">Login</div>
            <form method="POST" action="{{route('login.action')}}">
                @csrf
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Email
                    </label>
                    <input  class="border py-1 px-2  border-orange-500 rounded-md shadow-sm block mt-1 w-full" id="email" type="text" name="email" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password">
                        Password
                    </label>
                    <input  class="border py-1 px-2  border-orange-500 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
                </div>

                <div class="flex items-center justify-center mt-4">

                    <button class="px-16 rounded-full bg-orange-500 text-white font-bold py-3 uppercase" type="submit">
                        Login
                    </button>
                </div>

                <div class="block mt-4 text-center text-sm">
                    <div>Doesn't have an account? <a href="{{route('register')}}" class="text-ms text-orange-500">Sign up here</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
