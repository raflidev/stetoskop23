@extends('layout.app')

@section('content')

{{-- <x-navbar/>
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
                                            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('user.show', $data->user_id)}}" >User Profile</a></li>
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
</div> --}}
<div class="flex">
    <x-sidebar/>
    <div class="w-2/12"></div>
    <div class="w-10/12 bg-gray-100 min-h-screen">
        <x-navbar/>

        <div class="flex justify-center mt-32">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
            <h1 class="text-lg mb-6">Patients</h1>
            <div class="flex justify-between divide-x-2 divide-gray-300">
                <div class="grid grid-cols-2 w-1/2 text-center gap-4">
                    <x-item-card-grid count="{{$as_count}}" title="Aortic Stenosis">
                        <div class="bg-red-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        </x-item-card-grid>
                    <x-item-card-grid count="{{$mr_count}}" title="Mitral Regurgitation">
                        <div class="bg-red-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid count="{{$mvp_count}}" title="Mitral Valve Prolapse">
                        <div class="bg-red-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid count="{{$ms_count}}" title="Mitral Stenosis">
                        <div class="bg-red-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                </div>
                <div class="grid grid-cols-2 w-1/2 text-center gap-4 pl-5">
                    <x-item-card-grid count="{{$male_count}}" title="Male">
                        <div class="bg-blue-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>                              
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid count="{{$female_count}}" title="Female">
                        <div class="bg-pink-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-pink-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>                              
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid count="{{$n_count}}" title="Normal">
                        <div class="bg-green-100 flex items-center p-5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                    </x-item-card-grid>
                    <x-item-card-grid count="{{$nonverify_count}}" title="Not Verified">
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

        {{-- <div class="flex justify-center mt-32"> --}}
        <div class="flex justify-center">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
            <h1 class="text-lg mb-6">Patient Diagnoses</h1>

            <table id="myTable" class="display text-sm">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->nama_lengkap}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->alamat}}</td>
                        {{-- <td>{{$data->created_at}}</td> --}}
                        <td>
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button type="button" class="bg-gray-300 rounded-sm text-gray-700 py-2 px-4 rounded inline-flex items-center"><a href="{{route('prediksi.detail', $data->id)}}">Details</a></button>
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
@endsection

@section('script') 
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>

@endsection