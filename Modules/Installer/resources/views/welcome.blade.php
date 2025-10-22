@extends('installer::layout')

@section('content')

@php
    $steps = \Modules\Installer\Traits\InstallerTrait::getSteps();
@endphp

@section('title', __('installer.welcome_to_installer'))

<x-installer :steps="$steps" :cardTitle="__('installer.database_info_needed')" :cardText="__('installer.database_info_needed_description')">
    <x-slot:card>
        <div class="mb-12">
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col">
                    <div class="info-item d-flex align-items-center gap-4">
                        <div class="info-icon">
                            <img src="{{ asset('admin/installer/host.png') }}" alt="{{ __('installer.database_host') }}">
                        </div>
                        <div class="info-text">
                            <h5>{{ __('installer.database_host') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="info-item d-flex align-items-center gap-4">
                        <div class="info-icon">
                            <img src="{{ asset('admin/installer/db.png') }}" alt="{{ __('installer.database_name') }}">
                        </div>
                        <div class="info-text">
                            <h5>{{ __('installer.database_name') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="info-item d-flex align-items-center gap-4">
                        <div class="info-icon">
                            <img src="{{ asset('admin/installer/db-user.png') }}" alt="{{ __('installer.database_username') }}">
                        </div>
                        <div class="info-text">
                            <h5>{{ __('installer.database_username') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="info-item d-flex align-items-center gap-4">
                        <div class="info-icon">
                            <img src="{{ asset('admin/installer/db-password.png') }}" alt="{{ __('installer.database_password') }}">
                        </div>
                        <div class="info-text">
                            <h5>{{ __('installer.database_password') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:card>

    <x-slot:footer>
        <p class="installer-card-footer-text">
            {!! clean(pureText(__('installer.welcome_footer_text'))) !!}
        </p>
        <form action="{{ route('installer.verify') }}" method="POST">
            @csrf
            @method('POST')
            <button  class="ins-btn" type="submit">{{ __('installer.begin_installation') }}</button>
        </form>

    </x-slot:footer>
</x-installer>
@endsection