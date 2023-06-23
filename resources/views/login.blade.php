@extends('layout.app')

@section('content')
<div>
    @if ($errors->first('wrong'))
        <div id="error" class="px-5 bg-red-500 text-white py-3 rounded items-center">
            {{ $errors->first('wrong') }}
        </div>
    @endif
    <form action="{{route('login.action')}}" method="post">
        @csrf
        @method('POST')
        <div>
            <label class="block" for="email">email</label>
            <input type="text" name='email' class="block border border-gray-300">
        </div>
        <div>
            <label class="block" for="password">password</label>
            <input type="password" name='password' class="block border border-gray-300">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
