@extends('layout.app')

@section('content')

<x-navbar/>
<div class="min-h-screen bg-gray-100">
<!-- Livewire Component wire-end:D4eoLomnL0gWPLIdsXcf -->
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    Update your account&#039;s profile information and email address.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="post" action="{{route('user.update', Auth::user()->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="name">Name</label>
                                            <input value="{{Auth::user()->nama_lengkap}}" name="nama_lengkap" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="name" type="text" autocomplete="name">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="gender">Gender</label>
                                            <select id="gender" class="block mt-1 w-full" name="gender">
                                                <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                                <option value=""> -- Select Gender --</option>
                                                <option value="laki-laki" >Laki-laki</option>
                                                <option value="perempuan" >Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="address">Address</label>
                                            <input value="{{Auth::user()->alamat}}" name="alamat" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="address" type="text" autocomplete="address">
                                        </div>

                                        <!-- Email -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                                            <input value="{{Auth::user()->email}}" name="email" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="email" type="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="photo">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

<!-- Livewire Component wire-end:JNzR6xYwB4b5cgJ8hzp5 -->
                <div class="hidden sm:block">
    <div class="py-8">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

                            <div class="mt-10 sm:mt-0">
                    <div wire:id="tsO67mmeXNYSxivbdDsg" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;tsO67mmeXNYSxivbdDsg&quot;,&quot;name&quot;:&quot;profile.update-password-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;6951fbfa&quot;,&quot;data&quot;:{&quot;state&quot;:{&quot;current_password&quot;:&quot;&quot;,&quot;password&quot;:&quot;&quot;,&quot;password_confirmation&quot;:&quot;&quot;}},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;6dd4d5e7c6a28785b1b62e98ea2e499162d4d237871275e0bde8baf9c7c407ff&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">Update Password</h3>

        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <div class="px-4 sm:px-0">

    </div>
</div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="post" action="{{route('user.change_password', Auth::user()->id)}}">
            @csrf
            @method('PUT')
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
            <label class="block font-medium text-sm text-gray-700" for="current_password">
    Current Password
</label>
            <input name="password" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="current_password" type="password" autocomplete="current-password">
                    </div>

        <div class="col-span-6 sm:col-span-4">
            <label class="block font-medium text-sm text-gray-700" for="password">
    New Password
</label>
            <input name="new_password" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="password" type="password" autocomplete="new-password">
                    </div>

        <div class="col-span-6 sm:col-span-4">
            <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
    Confirm Password
</label>
            <input name="confirm_password" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="password_confirmation" type="password" autocomplete="new-password">
                    </div>
                </div>
            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <div x-data="{ shown: false, timeout: null }"
    x-init="window.livewire.find('tsO67mmeXNYSxivbdDsg').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
    class="text-sm text-gray-600 mr-3">
    Saved.
</div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
    Save
</button>
                </div>
                    </form>
    </div>
</div>

<!-- Livewire Component wire-end:tsO67mmeXNYSxivbdDsg -->                </div>
@endsection
