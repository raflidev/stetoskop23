@extends('layout.app')

@section('content')
<x-navbar/>
<div class="min-h-screen bg-gray-100">
    <div class="py-3 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center">Welcome, <strong>{{ Auth::user()->nama_lengkap }}</h3>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                <h3 class="text-center">Assign Doctor and User</h3>
                <form action="{{route('assign.store')}}" method="post">
                    @csrf
                    <div class="space-x-4 flex items-center mb-10">
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="id">
                                Doctor
                            </label>
                            <select name="dokter_id" id="id" class="p-4 border-t mr-0 border-b border-l text-black-800 border-blue-200 bg-white sm:rounded-lg">
                                <option value=""> -- Select Doctor --</option>
                                @foreach ($dokter as $d)
                                <option value="{{$d->id}}">{{$d->nama_lengkap}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="id">
                                pasien
                            </label>
                            <select name="user_id" id="id" class="p-4 border-t mr-0 border-b border-l text-black-800 border-blue-200 bg-white sm:rounded-lg">
                                <option value=""> -- Select Pasien --</option>
                                @foreach ($pasien as $p)
                                <option value="{{$p->id}}">{{$p->nama_lengkap}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-5">
                            <button class="px-5 sm:rounded-lg bg-yellow-400 text-black-800 font-bold p-4 uppercase border-t border-b border-r" type="submit">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pasien
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dokter
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($data as $data)
                        <tr>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->pasien}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->dokter}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->created_at}}
                            </td>
                            <td scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center"><a href="{{route('prediksi.result', $data->id)}}">Details</a></button>
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
