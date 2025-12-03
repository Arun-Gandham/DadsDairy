@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<h1 class="mb-4">Website & Company Settings</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="card p-4 mb-4">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $setting->site_name ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $setting->company_name ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Owner Name</label>
            <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name', $setting->owner_name ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Contact Email</label>
            <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $setting->contact_email ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Contact Phone</label>
            <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $setting->contact_phone ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Locations (one per line)</label>
            <textarea name="locations" class="form-control" rows="3">@if(isset($setting->locations)){{ implode("\n", $setting->locations) }}@endif</textarea>
            @if(isset($setting->locations) && is_array($setting->locations) && count($setting->locations))
                <div class="mt-2">
                    <strong>Saved Locations:</strong>
                    <ul class="mb-0">
                        @foreach($setting->locations as $loc)
                            <li>{{ $loc }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" id="logoInput">
            <div id="logoPreviewWrapper">
                @if(!empty($setting->logo))
                    <img id="logoPreview" src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-thumbnail mt-2" style="max-height:60px;">
                @else
                    <img id="logoPreview" src="#" alt="Logo Preview" class="img-thumbnail mt-2 d-none" style="max-height:60px;">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Favicon</label>
            <input type="file" name="favicon" class="form-control" id="faviconInput">
            <div id="faviconPreviewWrapper">
                @if(!empty($setting->favicon))
                    <img id="faviconPreview" src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" class="img-thumbnail mt-2" style="max-height:32px;">
                @else
                    <img id="faviconPreview" src="#" alt="Favicon Preview" class="img-thumbnail mt-2 d-none" style="max-height:32px;">
                @endif
            </div>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-gradient">Save Settings</button>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Logo preview
        const logoInput = document.getElementById('logoInput');
        const logoPreview = document.getElementById('logoPreview');
        if (logoInput) {
            logoInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        logoPreview.src = ev.target.result;
                        logoPreview.classList.remove('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
        // Favicon preview
        const faviconInput = document.getElementById('faviconInput');
        const faviconPreview = document.getElementById('faviconPreview');
        if (faviconInput) {
            faviconInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        faviconPreview.src = ev.target.result;
                        faviconPreview.classList.remove('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    });
</script>
@endsection
