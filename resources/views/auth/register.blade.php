@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Register</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Nama</label>
            <input id="name" type="text" 
                   class="form-control" 
                   name="name" 
                   value="{{ old('name') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input id="email" type="email" 
                   class="form-control" 
                   name="email" 
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" type="password" 
                   class="form-control" 
                   name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" 
                   class="form-control" 
                   name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>
@endsection
