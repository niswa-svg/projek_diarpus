@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Login</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email">Email</label>
            <input id="email" type="email" 
                   class="form-control" 
                   name="email" 
                   value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" type="password" 
                   class="form-control" 
                   name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </p>
</div>
@endsection
