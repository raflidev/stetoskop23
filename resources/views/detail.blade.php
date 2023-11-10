@extends('layout.app')

@section('head')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
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
                            <div class="bg-red-500 text-white py-1 px-2 rounded inline-flex items-center text-center rounded-md">
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
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection