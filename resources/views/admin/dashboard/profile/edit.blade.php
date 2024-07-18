@extends('layouts.app')

@section('title', 'Visitors Dashboard')

@section('header')
    <h2 class="text-4xl font-medium text-secondary">
        Profile
    </h2>
@endsection

@section('content')

<div class="sm:px-6 md:px-0 lg:px-0 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('admin.dashboard.profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('admin.dashboard.profile.partials.update-password-form')
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('admin.dashboard.profile.partials.delete-user-form')
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>

    </script>
@endsection




