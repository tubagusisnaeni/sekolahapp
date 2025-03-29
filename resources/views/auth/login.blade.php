@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-base-200">
    <div class="card w-96 bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="label" for="username">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" name="username" id="username" class="input input-bordered w-full" required>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-4">
                <label class="label" for="password">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="text-right mb-4">
                <a href="{{ route('password.request') }}" class="text-sm text-primary">Forgot Password?</a>
            </div>
        
            <button type="submit" class="btn btn-primary w-full">Login</button>
        </form>
        
        <div class="mt-4 text-center">
            <p class="text-sm">Don't have an account? 
                <a href="{{ route('register') }}" class="text-primary">Register</a>
            </p>
        </div>        
    </div>
</div>
@endsection
