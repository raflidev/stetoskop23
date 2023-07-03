@extends('layout.app')

@section('content')

<x-navbar/>
<div class="min-h-screen bg-gray-100" style="background-image: url(/images/bg-pasien.png)">
    <div class="flex h-screen justify-center">
        <div class="w-5/6 my-auto space-y-3">
            <span class="bg-black bg-opacity-60 border-l-2 border-orange-400 px-2 text-white">Our New Technology</span>
            <div class="text-white font-bold text-5xl w-4/12 leading-snug">Diagnostic Expert System</div>
            <div class="text-white w-4/12 font-medium ">
                We develop revolutionary technologies with delivering quality healthcare through medical technology
            </div>
            <button class=" bg-gradient-to-r to-orange-300 from-orange-500 hover:-translate-y-1 transition ease-in-out  duration-300 rounded-xl py-3 px-6 text-sm text-white">Explore More</button>
        </div>
    </div>
</div>
<div class="min-h-screen bg-gray-100">
    <div class="flex justify-center pt-10">
        <div class="w-5/6">
            <div class="flex">
                <div class="w-2/6 space-y-5">
                    <span class="border-l-4 border-yellow-300 px-2 bg-black bg-opacity-10">What We Do</span>
                    <div class="font-semibold text-3xl">AI & New <br/> Heart Solutions</div>
                </div>
                <div class="w-4/6">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex space-x-4 divide-x divide-gray-300">
                            <div>
                                <img src="/images/icon/tech.png" class="w-24" alt="">
                            </div>
                            <div class="space-y-2 pl-4">
                                <div class="text-xl">AI Detector</div>
                                <p class="text-sm w-8/12 font-medium text-gray-500">Advanced technology for identifying and analyzing artificial intelligence systems.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 divide-x divide-gray-300">
                            <div>
                                <img src="/images/icon/beat.png" class="w-24" alt="">
                            </div>
                            <div class="space-y-2 pl-4">
                                <div class="text-xl">Heart Record</div>
                                <p class="text-sm w-8/12 font-medium text-gray-500">A comprehensive and detailed documentation of an individual's cardiovascular health.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 divide-x divide-gray-300">
                            <div>
                                <img src="/images/icon/heart.png" class="w-24" alt="">
                            </div>
                            <div class="space-y-2 pl-4">
                                <div class="text-xl">Data Record</div>
                                <p class="text-sm w-8/12 font-medium text-gray-500">A collection of organized and structured information for storage and analysis.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4 divide-x divide-gray-300">
                            <div>
                                <img src="/images/icon/time.png" class="w-24" alt="">
                            </div>
                            <div class="space-y-2 pl-4">
                                <div class="text-xl">Fast Analytic Data</div>
                                <p class="text-sm w-8/12 font-medium text-gray-500">Rapid processing and analysis of large datasets for quick insights and decision-making.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
<div>
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
                <h3 class="text-center">Patient History</h3>
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Filename
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
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
                                {{$data->suara}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->jenis}}
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
