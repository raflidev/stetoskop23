<div class="fixed w-5/6 right-0 z-20">
    <div class="flex justify-center">
        <div class="w-5/6 bg-white mt-10 shadow rounded-sm py-5 px-8 ">
            <div class="flex justify-between text-gray-700 items-center relative">
                <div>
                <div class="text-lg">Welcome, <span class="font-medium">{{Auth::user()->nama_lengkap}}</span></div>
                <div class="text-sm">You are logged in as 
                    @if(Auth::user()->role == 'admin')
                        <span>Administrator</span>
                    @elseif(Auth::user()->role == 'pasien')
                        <span>Patient</span>
                    @else
                        <span>Doctor</span>
                    @endif

                </div>
                </div>
                <div class="shadow-md p-2 rounded-full outline outline-2 group hover:outline-orange-600 duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 group-hover:text-orange-600 duration-200">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>              
                <div class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transform ease absolute top-10 right-0 w-3/12 bg-white duration-300 outline outline-1 outline-gray-300 shadow rounded-sm">
                    <div class="text-gray-600">
                        <div class="px-4 pt-3 pb-1">
                            <h1 class="text-sm">{{Auth::user()->email}}</h1>
                            @if(Auth::user()->role == 'admin')
                                <span class="text-xs">Administrator</span>
                            @elseif(Auth::user()->role == 'pasien')
                                <span class="text-xs">Patient</span>
                            @else
                                <span class="text-xs">Doctor</span>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 divide-y-2 text-sm">
                            <div class="px-4 py-3 hover:bg-orange-300 duration-300">
                                <a href="/profile" class="flex space-x-3 items-center">
                                    <div>
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                      </svg>            
                                    </div>
                                    <span>Profile</span>
                                  </a>
                            </div>
                            <div class="px-4 py-3 hover:bg-orange-300 duration-300">
                                <a href="/logout" class="flex space-x-3 items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                          </svg>                                                      
                                    </div>
                                    <span>Logout</span>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
        </div>

</div>