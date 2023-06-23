@extends('layout.app')

@section('content')
    <div>
        <form action="{{route('register.action')}}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="block border border-gray-300">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="block border border-gray-300">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="block border border-gray-300">
            </div>
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="block border border-gray-300">
            </div>
            <div>
                <label for="gender">gender</label>
                <select id="gender" name="gender" class="block border border-gray-300">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
