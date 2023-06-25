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
                <!-- <div class="ostat">
                    <h3 class="">Overall Status</h3>
                    @csrf
                    <p>AS : {{$as}}</p>
                    <p>MR : {{$mr}}</p>
                    <p>MS : {{$ms}}</p>
                    <p>MVP : {{$mvp}}</p>
                    <p>N : {{$n}}</p>
                </div> -->
                <div class="currstat">
                    <h3 class="">Current Status</h3>
                    @csrf
                    <p>AS : {{$as}}</p>
                    <p>MR : {{$mr}}</p>
                    <p>MS : {{$ms}}</p>
                    <p>MVP : {{$mvp}}</p>
                    <p>N : {{$n}}</p>
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
