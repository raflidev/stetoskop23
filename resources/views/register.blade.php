@extends('layout.app')

@section('content')
    <div>
        <div class="font-sans text-gray-900 antialiased">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div>
                    <a href="/">
                        <img src="/images/logo.png" alt="" style="width: 100px; height:100px;">
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @if ($errors->first('wrong'))
                    <div id="error" class="px-5 bg-red-500 text-white py-3 mb-5 rounded items-center">
                        {{ $errors->first('wrong') }}
                    </div>
                @endif
                <form method="POST" action="{{route('register.action')}}" class="space-y-3">
                    @csrf
                    <div>
                        <label for="nama_lengkap" class="block font-medium text-sm text-gray-700">Nama Lengkap</label>
                        <input type="text" value="{{old('nama_lengkap')}}" class="border py-1 px-2  border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div>
                        <label for="alamat" class="block font-medium text-sm text-gray-700">Alamat</label>
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

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route('login')}}">
                            Already registered?
                        </a>
                        <button class="ml-4 px-2 sm:rounded-lg bg-yellow-400 text-black-800 font-bold p-2 uppercase border-t border-b border-r" type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <form action="{{route('register.action')}}" method="post">
            @csrf
            @method('POST')

        </form>
    </div>
@endsection
