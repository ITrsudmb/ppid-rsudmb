@extends('layouts.auth')

@section('content')
@include('layouts.message')
<div class="flex justify-center items-center min-h-screen bg-linear-to-br from-blue-50 to-blue-100">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
        <h2 class="text-center text-3xl font-bold mb-8 text-blue-700">Login Admin RS</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2.5 rounded-lg shadow-md hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection
