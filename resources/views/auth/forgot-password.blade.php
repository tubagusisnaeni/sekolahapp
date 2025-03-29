@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-base-200">
    <div class="card w-96 bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-4">Reset Password</h2>

        @if (session('status'))
            <p class="text-green-500 text-sm mb-4">{{ session('status') }}</p>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="label" for="email">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" id="email" class="input input-bordered w-full" required>
            </div>

            <button type="submit" class="btn btn-primary w-full">Send Reset Link</button>
        </form>
    </div>
</div>
@endsection
