<!doctype html>
<html class="no-js agntix-light" lang="{{ getSiteLocale() ?? 'en' }}" dir="{{ session('dir') ?? 'ltr' }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>@yield('meta_title', $settings?->app_name)</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <meta name="description" content="@yield('meta_description', '')">
   <meta name="keywords" content="@yield('meta_keywords', '')">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="robots" content="{{ $settings?->search_engine_indexing == 1 ? 'index, follow' : 'noindex, nofollow' }}">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="{{ asset($settings?->favicon) }}">
   @stack('custom_meta')

   <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($settings?->favicon) }}">

   @stack('css_before')
   @include('frontend.layouts.partials.styles')
   @stack('css')

   @include('frontend.layouts.partials.header-scripts')

</head>


@php
   $theme_name = session()->has('demo_homepage') ? session()->get('demo_homepage') : SITE_DEFAULT_HOME;
@endphp

<body class="tp-magic-cursor {{ isThisRoute('home', "home_{$theme_name}") }} ">

   @if ($settings?->google_tagmanager_status == 1)
      <noscript>
         <iframe class="google-tag-manager ss-google-tag-manager" src="https://www.googletagmanager.com/ns.html?id={{ $settings?->google_tagmanager_id }}" height="0" width="0"></iframe>
      </noscript>
   @endif

   <div id="scroll-indicator"></div>

   <!-- Begin magic cursor -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->

   @if ($settings->preloader_status == 1)
   <!-- pre loader area start -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
   <!-- pre loader area end -->
   @endif


   @if ($settings->backtotop_status == 1)
   <!-- back to top start -->
   <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
         <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
      </button>
   </div>
   <!-- back to top end -->
   @endif

   @yield('header')

   @include('frontend.layouts.offcanvas')

   <div id="smooth-wrapper">
        <div id="smooth-content" class="{{ $theme_name == 'home_main' && isThisRoute('home', "home_{$theme_name}") ? ' body-padding' : '' }} ">
            <main>
                @yield('content')

                @yield('footer')
            </main>
        </div>
   </div>

   <div id="ajax-loading">
        <div class="ajax-loading-inner d-flex justify-content-center align-items-center flex-column">
            <div class="ajax-loading-spinner"></div>
        </div>
   </div>

   @include('frontend.layouts.partials.login-modal')
   @include('frontend.layouts.partials.quick-view-modal')

    @yield('modals')
    @stack('modal-stack')
    @stack('js_before')
    @include('frontend.layouts.partials.scripts')
    @include('frontend.layouts.partials.shop-scripts')
    @stack('js')

</body>
</html>
