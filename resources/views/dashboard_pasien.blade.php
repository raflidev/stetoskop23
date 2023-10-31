@extends('layout.app')

@section('content')

{{-- <x-navbar/> --}}
{{-- <div class="min-h-screen bg-gray-100 bg-no-repeat bg-cover" style="background-image: url(/images/bg-pasien.png)">
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
</div> --}}
{{-- <x-footer/> --}}

<div class="flex">
    <x-sidebar/>
    <div class="w-10/12 bg-gray-100 min-h-screen">
        <div class="flex justify-center">
        <div class="w-5/6 bg-white mt-10 shadow rounded-sm py-5 px-8">
            <div class="flex justify-between text-gray-700 items-center">
                <div>
                <div class="text-lg">Welcome, <span class="font-medium">Rafli Ramadhan</span></div>
                <div class="text-sm">You are logged in as patient</div>
                </div>
                <div class="shadow-md p-2 rounded-full outline outline-2 group hover:outline-orange-600 duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 group-hover:text-orange-600 duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>              
                </div>
            </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-5/6 bg-white mt-5 shadow rounded-sm py-5 px-8 text-gray-700">
            <h1 class="text-lg mb-6">Diagnoses</h1>
            <div class="flex justify-between divide-x-2 divide-gray-300">
                <div class="grid grid-cols-2 w-1/2 text-center gap-4">

                <div class="flex space-x-5 items-center">
                    <div class="bg-red-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Aortic Stenosis</span>
                    </div>
                </div>
                
                <div class="flex space-x-5 items-center">
                    <div class="bg-red-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Mitral Regurgitation</span>
                    </div>
                </div>
                
                <div class="flex space-x-5 items-center">
                    <div class="bg-red-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Mitral Valve Prolapse</span>
                    </div>
                </div>
                
                <div class="flex space-x-5 items-center">
                    <div class="bg-red-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Mitral Stenosis</span>
                    </div>
                </div>
                
                </div>
                <div class="grid grid-cols-2 w-1/2 text-center gap-4 pl-5">
                <div class="flex space-x-5 items-center">
                    <div class="bg-blue-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Verified</span>
                    </div>
                </div>
                <div class="flex space-x-5 items-center">
                    <div class="bg-orange-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Not Verified</span>
                    </div>
                </div>
                <div class="flex space-x-5 items-center">
                    <div class="bg-green-100 flex items-center p-5 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-7 h-7 text-green-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    
                    </div>
                    <div class="text-left">
                    <h1 class="text-xl">0</h1>
                    <span class="text-gray-500 text-sm">Normal</span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="flex justify-center">
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
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>

@endsection