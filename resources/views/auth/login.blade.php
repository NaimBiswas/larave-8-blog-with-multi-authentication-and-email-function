@push('css')
<link href="{{ asset('assets/fontend') }}/front-page-category/css/styles.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/front-page-category/css/responsive.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/blank-static/css/styles.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/blank-static/css/responsive.css"
    rel="stylesheet">
@endpush
@section('title', 'LogIn Form Here')


@extends('layouts.fontend.app')
@section('content')

<div class="slider display-table center-text">
    <h1 class="title display-table-cell"><b>Log In Fom Here</b></h1>
</div>



@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif

<section class="blog-area section">
    <div class="container">

        <div class="row">
            <div class="col-lg-2 col-md-0"></div>
            <div class="col-lg-8 col-md-12">
                @include('include.error')
                <div class="post-wrapper">

                    <h3 class="title"><a href="#"><b>LogIn Form Here</b></a></h3>
                    <form action="{{ route('login') }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="float-left"
                                for="name">Email:</label>
                            <input type="text "
                                placeholder="Enter Your Email Address"
                                class="form-control"
                                name="email"
                                value="{{ old('email') }}"
                                autofocus
                                required>
                        </div>
                        <div class="form-group">
                            <label class="float-left"
                                for="name">Password:</label>
                            <input type="password"
                                name="password"
                                placeholder="Enter Your Password"
                                class="form-control"
                                autofocus
                                required>
                        </div>
                        <div style="margin-bottom: 70px;"
                            class="block mt-4">
                            <label for="remember_me"
                                class="flex items-center float-left ">
                                <input id="remember_me"
                                    type="checkbox"
                                    class="form-checkbox"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                            <a class="float-right underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>
                        <button style="cursor: pointer;"
                            type="submit"
                            class=" float-right btn btn-primary">Log In</button>
                    </form>


                </div><!-- post-wrapper -->
            </div><!-- col-sm-8 col-sm-offset-2 -->
        </div><!-- row -->

    </div><!-- container -->
</section>
@endsection




{{--
<form method="POST"
    action="{{ route('login') }}">
@csrf

<div>
    <x-jet-label for="email"
        value="{{ __('Email') }}" />
    <x-jet-input id="email"
        class="block mt-1 w-full"
        type="email"
        name="email"
        :value="old('email')"
        required
        autofocus />
</div>

<div class="mt-4">
    <x-jet-label for="password"
        value="{{ __('Password') }}" />
    <x-jet-input id="password"
        class="block mt-1 w-full"
        type="password"
        name="password"
        required
        autocomplete="current-password" />
</div>

<div class="block mt-4">
    <label for="remember_me"
        class="flex items-center">
        <input id="remember_me"
            type="checkbox"
            class="form-checkbox"
            name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900"
        href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-jet-button class="ml-4">
        {{ __('Login') }}
    </x-jet-button>
</div>
</form> --}}








{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />


    </x-jet-authentication-card>
</x-guest-layout> --}}
