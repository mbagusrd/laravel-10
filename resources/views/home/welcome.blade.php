@extends('layout.home')
@section('page_title', 'Selamat Datang')
@section('page_content')
    <div class="card">
        <div class="card-body">
            <p>Selamat Datang di {{ env('APP_NAME') }},
                @auth
                    <b>{{ auth()->user()->name }}</b>
                @endauth
                @guest
                    silahkan login untuk masuk ke aplikasi
                @endguest
            </p>
            @guest
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            @endguest
        </div>
    </div>
@endsection
