@extends('layout.app')

@section('content')
<x-navbar/>
<div class="min-h-screen bg-gray-100">
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center">Patient Profile</h3>
                <div class="mt-4">
                    <p>Patient Name : {{$data->nama_lengkap}}</p>
                </div>
                <div class="mt-4">
                    <p>Gender : {{$data->gender}}</p>
                </div>
                <div class="mt-4">
                    <p>Address : {{$data->alamat}}</p>
                </div>
                <div class="mt-4">
                    <p>Email : {{$data->email}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
