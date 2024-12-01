@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<section>
    <div name="header">
        <h1 class="mt-24 mx-20 text-2xl text-black font-bold mb-6">Edit Profil</h1>
    </div>

    <div class="pb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
        @endif
            <div class="p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
    
            <div class="p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
    
            <div class="p-4 sm:p-8 bg-gray-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection