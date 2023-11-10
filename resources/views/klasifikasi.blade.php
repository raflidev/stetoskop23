@extends('layout.app')

@section('head')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
    {{-- <x-navbar/>
    <div class="min-h-screen bg-gray-100 bg-no-repeat bg-cover" style="background-image: url(/images/bg-klasifikasi.png)">
        <div class="flex h-screen justify-center">
            <div class="w-5/6 my-auto space-y-3">
                <span class="bg-black bg-opacity-60 border-l-2 border-orange-400 px-2 text-white">Classification</span>
                <div class="text-white font-bold text-5xl w-4/12 leading-snug">Classification For Your Heart</div>
                <div class="text-white w-4/12 font-medium ">
                    We perform data processing based on the results of the heart recordings that you do with our tool
                </div>
                <button onClick="showAdd()" class=" bg-gradient-to-r to-orange-300 from-orange-500 hover:-translate-y-1 transition ease-in-out  duration-300 rounded-xl py-3 px-6 text-sm text-white">Add Data</button>
            </div>
        </div>
    </div>
    <div class="min-h-screen bg-gray-100 pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <form action="{{route('prediksi.run', ['user_id' => Auth::user()->id])}}" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="px-6 py-3">
                <table class="min-w-full divide-y divide-gray-200 w-full rounded-xl">
                    <thead>
                        <tr>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white rounded-l-md uppercase tracking-wider">
                                Filename
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Type
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" width="300" class="px-6 py-3 bg-orange-500 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Note from Doctor
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
                        <tr class="space-y-2">
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->suara}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->jenis}}
                            </td>
                            <td scope="col" width="300" class="px-6 py-3  bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                @if($data->status == 0)
                                    <button class="bg-red-500 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                                        Not Verified    
                                    </button>
                                @else
                                    <button class="bg-green-500 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                                        Verified    
                                    </button>
                                @endif
                            </td>
                            <td scope="col" width="300" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{$data->note}}
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

        <div id="add" class="invisible fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 duration-200 ease opacity-0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="absolute top-1 right-5">
                            <button onClick="hideAdd()" class="bg-red-500 text-white font-bold p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                            </button>
                        </div>
                        <h3 class="text-center">Classification</h3>
                        <form action="{{route('prediksi.run', ['user_id', Auth::user()->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-4">
                                @if(Auth::user()->role == 'dokter')
                                <div>
                                        <label class="block font-medium text-sm text-gray-700" for="id">
                                            pasien
                                        </label>
                                        <select name="user_id" id="id" class="p-4 border mr-0 text-black-800 border-blue-200 bg-white sm:rounded-lg">
                                            <option value=""> -- Select Pasien --</option>
                                            @foreach ($pasien as $p)
                                            <option value="{{$p->id}}">{{$p->nama_lengkap}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="file">
                                        Upload Signal Data
                                    </label>
                                    <input id="file" class="p-4 border mr-0  text-black-800 border-blue-200 bg-white sm:rounded-lg" type="file" :value="old('file')" name="file">
                                </div>
                                <button class="px-16 w-full rounded-full bg-orange-500 text-white font-bold py-3 uppercase" type="submit">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/> --}}

    <div class="flex">
        <x-sidebar/>
        <div class="w-2/12"></div>
        <div class="w-10/12 bg-gray-100 min-h-screen">
            <x-navbar/>

            <div class="flex justify-center mt-32">
                <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
                <h1 class="text-lg mb-6">Latest Diagnoses</h1>
    
                <table id="myTable" class="display text-sm">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>Type</th>
                            <th>Diagnose</th>
                            <th>Status</th>
                            <th>Note from Doctor</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$data->suara}}</td>
                            <td>{{$data->jenis}}</td>
                            <td>
                                @if($data->result == 0)
                                Aortic Stenosis
                                @elseif($data->result == 1)
                                Mitral Regurgitation
                                @elseif($data->result == 2)
                                Mitral Stenosis
                                @elseif($data->result == 3)
                                Mitral Valve Prolapse
                                @else
                                Normal
                                @endif
                            </td>
                            <td>
                                @if($data->status == 0)
                                <div class="bg-red-500 text-white py-1 px-2 rounded inline-flex items-center rounded-md">
                                    Not Verified    
                                </div>
                                @else
                                    <div class="bg-green-500 text-white py-1 px-2 rounded inline-flex items-center rounded-md">
                                        Verified    
                                    </div>
                                @endif
                            </td>
                            <td>{{$data->note}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="bg-gray-300 rounded-sm text-gray-700 py-2 px-4 rounded inline-flex items-center"><a href="{{route('prediksi.result', $data->id)}}">Details</a></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
        </div>

        <div class="flex justify-center">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
                <h1 class="text-lg mb-6">Upload File</h1>
                <form action="{{route('prediksi.run', ['user_id' => Auth::user()->id])}}" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        function showAdd() {
            document.getElementById('add').classList.remove('invisible');
            document.getElementById('add').classList.add('visible');
            document.getElementById('add').classList.remove('opacity-0');
            document.getElementById('add').classList.add('opacity-100');
        }

        function hideAdd() {
            document.getElementById('add').classList.remove('visible');
            document.getElementById('add').classList.add('invisible');
            document.getElementById('add').classList.remove('opacity-100');
            document.getElementById('add').classList.add('opacity-0');
        }
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
