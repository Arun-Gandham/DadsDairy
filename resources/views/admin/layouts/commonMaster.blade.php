<!DOCTYPE html>
@php
$menuFixed = ($configData['layout'] === 'vertical') ? ($menuFixed ?? '') : (($configData['layout'] === 'front') ? '' : $configData['headerType']);
$navbarType = ($configData['layout'] === 'vertical') ? ($configData['navbarType'] ?? '') : (($configData['layout'] === 'front') ? 'layout-navbar-fixed': '');
$isFront = ($isFront ?? '') == true ? 'Front' : '';
$contentLayout = (isset($container) ? (($container === 'container-xxl') ? "layout-compact" : "layout-wide") : "");
@endphp

<html lang="{{ session()->get('locale') ?? app()->getLocale() }}" class="{{ $configData['style'] }}-style {{($contentLayout ?? '')}} {{ ($navbarType ?? '') }} {{ ($menuFixed ?? '') }} {{ $menuCollapsed ?? '' }} {{ $footerFixed ?? '' }} {{ $customizerHidden ?? '' }}" dir="{{ $configData['textDirection'] }}" data-theme="{{ $configData['theme'] }}" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="{{ $configData['layout'] . '-menu-' . $configData['theme'] . '-' . $configData['style'] }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') |
    {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }} -
    {{ config('variables.templateSuffix') ? config('variables.templateSuffix') : 'TemplateSuffix' }}
  </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  @php
    $settings = \App\Models\Setting::first();
    $faviconPath = !empty($settings?->favicon) && $settings->favicon === 'favicon.ico'
      ? asset('favicon.ico')
      : (!empty($settings?->favicon) ? asset($settings->favicon) : asset('assets/img/favicon/favicon.ico'));
  @endphp
  <link rel="icon" type="image/x-icon" href="{{ $faviconPath }}" />

  

  <!-- Include Styles -->
  <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
  @include('admin/layouts/sections/styles' . $isFront)

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
  @include('admin/layouts/sections/scriptsIncludes' . $isFront)
</head>

<body>


  <!-- Toast for session messages (always at top of page, above header) -->
  @if(session('success') || session('error') || session('message'))
  <div style="position:fixed;top:0;left:0;width:100vw;z-index:2000;pointer-events:none;">
    <div class="d-flex justify-content-end w-100">
      <div class="toast align-items-center text-bg-{{ session('success') ? 'success' : (session('error') ? 'danger' : 'info') }} border-0 m-3 show" id="sessionToast" role="alert" aria-live="assertive" aria-atomic="true" style="min-width:300px;max-width:400px;pointer-events:auto;">
        <div class="d-flex">
          <div class="toast-body">
            {{ session('success') ?? session('error') ?? session('message') }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var toastEl = document.getElementById('sessionToast');
      if (toastEl && window.bootstrap) {
        var toast = new bootstrap.Toast(toastEl, { delay: 5000 });
        toast.show();
      }
    });
  </script>
  @endif

  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  @include('admin/layouts/sections/scripts' . $isFront)

</body>

</html>
