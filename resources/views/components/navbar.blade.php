<div class="fixed w-full">
    <!-- Primary Navigation Menu -->
    <nav class="bg-black bg-opacity-70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a class="inline-flex items-center {{request()->is('dashboard') ? 'border-orange-500 text-orange-500' : 'hover:border-orange-500 border-transparent'}} text-white px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-500 hover:text-orange-400 focus:outline-none focus:text-orange-600 focus:border-orange-500 transition" href="{{route('dashboard')}}">Home</a>
                        @if(Auth::user()->role == 'admin')
                            <a class="inline-flex items-center {{request()->is('assign') ? 'border-orange-500 text-orange-500' : 'hover:border-orange-500 border-transparent'}} text-white px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-500 hover:text-orange-400 focus:outline-none focus:text-orange-600 focus:border-orange-500 transition" href="{{route('assign.index')}}">Add Dokter</a>
                        @endif
                        @if(Auth::user()->role == 'pasien')
                            <a class="inline-flex items-center {{request()->is('ownCheck') ? 'border-orange-500 text-orange-500' : 'hover:border-orange-500 border-transparent'}} text-white px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-500 hover:text-orange-400 focus:outline-none focus:text-orange-600 focus:border-orange-500 transition" href="{{route('prediksi.check_index')}}">Classification</a>
                        @endif
                        {{-- @if(Auth::user()->role == 'dokter')
                            <a class="inline-flex items-center {{request()->is('prediksi.check_index') ? 'border-orange-500 text-orange-500' : 'hover:border-orange-500 border-transparent'}} text-white px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-500 hover:text-orange-400 focus:outline-none focus:text-orange-600 focus:border-orange-500 transition" href="{{route('prediksi.check_index')}}">Classification</a>
                        @endif --}}
                    </div>
                     <!-- Logo -->
                     <div class="flex-shrink-0 flex items-center">
                        <a href="{{route('dashboard')}}">
                            <img src="/images/logo.png" alt="" class="w-24">
                        </a>
                    </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        <div onclick="toggleDropdown()">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white  hover:text-orange-500 focus:outline-none transition">
                                    {{Auth::user()->nama_lengkap}}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </div>

                        <div id="dropdown-menu" class="ease-in-out duration-300 rounded-md ring-1 absolute w-32 top-10 ring-black ring-opacity-5 py-1 bg-white hidden">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Account
                            </div>

                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{route('user.edit')}}">Profile</a>


                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" >Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open =! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</div>

<script>
    // toggle dropdown menu
    function toggleDropdown() {
        document.getElementById("dropdown-menu").classList.toggle("hidden");
    }
</script>
