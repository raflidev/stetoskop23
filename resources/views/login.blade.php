@extends('layout.app')

@section('content')
<div class="font-popins">
    <div class="min-h-screen flex flex-col">
        <div class="flex">
            <div class="w-8/12 bg-orange-500/80">
                <div class="w-full h-screen flex items-center justify-center">
                    <a href="/" class="rounded-sm">
                        <img src="/images/image-login.png" class="" alt="">
                    </a>
                </div>
            </div>
            <div class="w-4/12">
                <div class="w-full h-screen flex items-center justify-center">
                    <div class="w-9/12 text-gray-700">
                        <h1 class="font-medium text-xl">Welcome to VAMIC 👋🏻</h1>
                        <p class="text-sm">Please sign in to your account</p>
                        <form method="POST" action="{{route('login.action')}}" class="mt-5">
                            @csrf
                            <div>
                                <label class="block text-sm text-gray-700" for="email">
                                    Email
                                </label>
                                <input  class="border py-1 px-2 border-gray-200 outline-1 focus:outline-orange-500/70 duration-500 rounded-sm shadow-sm block mt-1 w-full" id="email" type="text" name="email" required="required" autofocus="autofocus">
                            </div>
            
                            <div class="mt-4">
                                <label class="block text-sm text-gray-700" for="password">
                                    Password
                                </label>
                                <input  class="border py-1 px-2 border-gray-200 outline-1 focus:outline-orange-500/70 duration-500 rounded-sm shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
                            </div>
            
                            <div class="flex items-center justify-center mt-4">
            
                                <button class="w-full rounded-sm bg-orange-500 text-white font-medium py-2" type="submit">
                                    Login
                                </button>
                            </div>
            
                            <div class="block mt-4 text-center text-sm">
                                <div>Doesn't have an account? <a href="{{route('register')}}" class="text-ms text-orange-500">Sign up here</a></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
