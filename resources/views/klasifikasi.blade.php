@extends('layout.app')

@section('content')
    <x-navbar/>
    <div class="min-h-screen bg-gray-100 pt-10">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h3 class="text-center">Classification</h3>
                    <form action="{{route('prediksi.run')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-28">
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
                            <button class="px-5 sm:rounded-lg bg-yellow-400 text-black-800 font-bold p-4 uppercase border-t border-b border-r" type="submit">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
