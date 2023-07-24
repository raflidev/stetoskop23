@extends('layout.app')

@section('head')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<x-navbar/>
<div class="min-h-screen bg-gray-100">
    <div class="h-[20rem] bg-cover bg-no-repeat" style="background-image: url(/images/bg-pasien.png)">
        <div class="flex h-full justify-center">
            <div class="w-5/6 my-auto space-y-3">
                <div class="text-white font-bold text-5xl w-6/12 leading-snug">Patient Profile</div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden sm:rounded-lg">
                {{-- <h3 class="">Detail Patient</h3> --}}
                <div class="">
                    <p class="text-xl font-bold">{{$data->nama_lengkap}}</p>
                    <p>{{$data->gender}}</p>
                </div>
                <div class="mt-4 flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                      </svg>
                    <p>{{$data->alamat}}</p>
                </div>
                <div class="mt-4 flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                      </svg>

                    <p>{{$data->email}}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <form action="{{route('prediksi.run', ['user_id' => $user_id])}}" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <table class="min-w-full divide-y divide-gray-200 w-full rounded-xl">
                <thead>
                    <tr>
                        <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white rounded-l-md uppercase tracking-wider">
                            Filename
                        </th>
                        <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white  uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white  uppercase tracking-wider">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white rounded-r-md uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($history as $history)
                    <tr>
                        <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{$history->suara}}
                        </td>
                        <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{$history->jenis}}
                        </td>
                        <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{$history->created_at}}
                        </td>
                        <td scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button type="button" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center"><a href="{{route('prediksi.result', $history->id)}}">Details</a></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-footer/>
</div>
@endsection
