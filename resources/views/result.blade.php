@extends('layout.app')


@section('content')
<x-navbar/>
<div class="min-h-screen bg-gray-100 pt-10">
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4">
                    <p>Doctor or Nurse : {{$data->nama_dokter}}</p>
                </div>
                <div class="mt-4">
                    <p>Filename : {{$data->suara}}</p>
                    <p class="hidden">path : <span id="path">{{$data->file_path}}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center">PCG Monitoring</h3>
                <div id='myDiv'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                </div>
                <div class="links">
                    <button type="button" name="playbtn" onclick="wavesurfer.play()">Play</button>
                    <button type="button" name="playbtn" onclick="wavesurfer.pause()">Pause</button>
                    <span id="currentDuration">00:00</span> / <span id="duration"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 py-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
               {{-- <div class="ostat">
                    <h3 class="">Overall Status</h3>
                    @csrf
                    <p>AS : {{$as}}</p>
                    <p>MR : {{$mr}}</p>
                    <p>MS : {{$ms}}</p>
                    <p>MVP : {{$mvp}}</p>
                    <p>N : {{$n}}</p>
                </div> --}}
                <div class="currstat">
                    <div class="flex justify-center">
                        <div class="w-5/6 grid grid-cols-5 gap-4 text-center">
                            <div class="flex flex-col space-y-3">
                                <div class="py-2 px-4 rounded font-semibold text-lg text-white bg-orange-500">
                                    AS
                                </div>
                                <div class="flex justify-center">
                                    @if($as == 'true')
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-green-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-red-500">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                      </svg>

                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <div class="py-2 px-4 rounded font-semibold text-lg text-white bg-orange-500">
                                    MR
                                </div>
                                <div class="flex justify-center">
                                    @if($mr == 'true')
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-green-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-red-500">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                      </svg>

                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <div class="py-2 px-4 rounded font-semibold text-lg text-white bg-orange-500">
                                    MS
                                </div>
                                <div class="flex justify-center">
                                    @if($ms == 'true')
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-green-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-red-500">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                      </svg>

                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <div class="py-2 px-4 rounded font-semibold text-lg text-white bg-orange-500">
                                    MVP
                                </div>
                                <div class="flex justify-center">
                                    @if($mvp == 'true')
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-green-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-red-500">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                      </svg>

                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col space-y-3">
                                <div class="py-2 px-4 rounded font-semibold text-lg text-white bg-orange-500">
                                    N
                                </div>
                                <div class="flex justify-center">
                                    @if($n == 'true')
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-green-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                      </svg>
                                    @else
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-red-500">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                      </svg>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var wavesurfer;
    wavesurfer = WaveSurfer.create({
        container: "#myDiv",
        waveColor: 'rgb(200, 0, 200)',
        progressColor: 'rgb(100, 0, 100)',
    })

    // Load the audio file here.
    var load = "/"+document.getElementById('path').textContent
    wavesurfer.load(load);
    wavesurfer.on('ready', function () {
            let time = wavesurfer.getDuration();
            // dom js vanilla
            document.getElementById("duration").innerHTML = formateTime(time);
        });
        wavesurfer.on('audioprocess', function () {
            let time = wavesurfer.getCurrentTime();
            // $("#currentDuration").text(formateTime(time));
            document.getElementById("currentDuration").innerHTML = formateTime(time);
        });

        function formateTime(time) {
            var minutes = Math.floor(time / 60).toFixed(0);
            minutes = (minutes < 10)?"0"+minutes:minutes;
            var seconds = (time - minutes * 60).toFixed(0);
            seconds = (seconds < 10)?"0"+seconds:seconds;
            return minutes.substr(-2) + ":" + seconds;
        }
</script>
@endsection
