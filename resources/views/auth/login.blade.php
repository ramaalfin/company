@extends('layouts.app')

@section('content')
    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="px-6 py-4">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
            </div>

            <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome Back</h3>

            <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login or create account</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{-- EMAIL --}}
                <div class="w-full mt-4">
                    <input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300 form-control @error('email') is-invalid @enderror"
                        id="email" type="email" placeholder="Email Address" aria-label="Email Address" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus />

                    @error('email')
                        <span class="invalid-feedback text-red-600 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="w-full mt-4">
                    <input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password"
                        aria-label="Password" />

                    @error('password')
                        <span class="invalid-feedback text-red-600 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button
                        class="w-full px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 mt-2 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                        type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>

        <div class="flex items-center justify-center py-4 text-center bg-gray-50 dark:bg-gray-700">
            <span class="text-sm text-gray-600 dark:text-gray-200">Don't have an account? </span>

            <a href="{{ route('register') }}"
                class="mx-2 text-sm font-bold text-blue-500 dark:text-blue-400 hover:underline">Register</a>
        </div>
    </div>
@endsection
