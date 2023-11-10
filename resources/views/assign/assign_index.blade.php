@extends('layout.app')

@section('content')
{{-- <x-navbar/>
<div class="min-h-screen bg-gray-100">
    <div class="h-[30rem]" style="background-image: url(/images/bg-pasien.png)">
        <div class="flex h-full justify-center">
            <div class="w-5/6 my-auto space-y-3">
                <span class="px-2 text-white">Hello, <strong>{{ Auth::user()->nama_lengkap }}</strong></span>
                <div class="text-white font-bold text-5xl w-4/12 leading-snug">Assign Dokter</div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center">Welcome, <strong>{{ Auth::user()->nama_lengkap }} </strong></h3>
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
                                pasien
                            </label>
                            <select name="user_id" id="id" class="p-4 border-t mr-0 border-b border-l text-black-800 border-blue-200 bg-white sm:rounded-lg">
                                <option value=""> -- Select Pasien --</option>
                                @foreach ($pasien as $p)
                                <option value="{{$p->id}}">{{$p->nama_lengkap}}</option>
                                @endforeach
                            </select>
                        </div>
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
    <x-footer/>
</div> --}}
<div class="flex">
    <x-sidebar/>
    <div class="w-2/12"></div>
    <div class="w-10/12 bg-gray-100 min-h-screen">
        <x-navbar/>

        <div class="flex justify-center mt-32">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
            <h1 class="text-lg mb-6">Diagnoses</h1>
            <div class="flex justify-between divide-gray-300">
                <div class="grid grid-cols-4 w-full text-center gap-4">
                    <x-item-card-grid :count="$pasien_count" title="Patient">
                        <div class="bg-green-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>                              
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid :count="$dokter_count" title="Doctor">
                        <div class="bg-green-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>                              
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid :count="$assigned_count" title="Assigned">
                        <div class="bg-blue-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid :count="$notassigned_count" title="Not Assigned">
                        <div class="bg-orange-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-orange-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                </div>
            </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
                <h1 class="text-lg mb-6">Relation Patient and Doctor</h1>
                <div>
                    <form action="{{route('assign.store')}}" method="post">
                        @csrf
                        <div class="mb-10 space-y-3">
                            <div>
                                <h2 class="text-sm text-gray-600 mb-2">
                                    Patient
                                </h2>
                                <select name="user_id" id="id" class="border border-gray-500 w-2/6 rounded-sm px-3 py-2">
                                    <option value=""> -- Select Pasien --</option>
                                    @foreach ($pasien as $p)
                                    <option value="{{$p->id}}">{{$p->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <h2 class="text-sm text-gray-600 mb-2" for="id">
                                    Doctor
                                </h2>
                                <select name="dokter_id" id="id" class="border border-gray-500 w-2/6 rounded-sm px-3 py-2">
                                    <option value=""> -- Select Doctor --</option>
                                    @foreach ($dokter as $d)
                                    <option value="{{$d->id}}">{{$d->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pt-5">
                                <button class="bg-orange-500 text-white rounded-sm px-3 py-1" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
                <h1 class="text-lg mb-6">Table Patient and Doctor</h1>
                <div>
                    <table id="myTable" class="display text-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$data->pasien}}</td>
                                <td>{{$data->dokter}}</td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                            @php $no++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );
</script>
@endsection
