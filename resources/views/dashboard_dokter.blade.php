@extends('layout.app')

@section('content')

<x-navbar/>
<div class="min-h-screen bg-gray-100">
    <div class="h-[20rem] bg-cover bg-no-repeat" style="background-image: url(/images/bg-pasien.png)">
        <div class="flex h-full justify-center">
            <div class="w-5/6 my-auto space-y-3">
                <span class="text-white">Hello, <strong>{{ Auth::user()->nama_lengkap }}</strong></span>
                <div class="text-white font-bold text-5xl w-6/12 leading-snug">Find Patient</div>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center py-3">
                <form action="/dashboard" class="flex space-x-3 items-center w-1/2">
                    <input name="name" type="text" class="py-2 px-5 rounded w-full" placeholder="Search Patient"/>
                    <button type="submit" class="bg-orange-500 py-2 px-3 rounded">Search</button>
                </form>
            </div>
            <div class="px-6 py-3 overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full rounded-xl">
                    <thead>
                        <tr>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white rounded-l-md uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Gender
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Address
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white rounded-r-md uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($data as $data)
                        <tr>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->nama_lengkap}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->gender}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->alamat}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->created_at}}
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div>
                                    <div class="group inline-block">
                                        <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                            <span class="mr-1">Options</span>
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </button>
                                        <ul class="invisible group-hover:visible absolute text-gray-700 pt-1">
                                            {{-- <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('dokter.dokter.classification', $pasien->user_id)}}">Classification Offline</a></li> --}}
                                            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('user.show', $data->user_id)}}" >User Profile</a></li>
                                            {{-- <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('prediksi.detail', $data->user_id)}}" >Details</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
