{{-- Warna dari Admin > Setting > Warna. Di-include SETELAH ui-refresh.css agar menimpa nilai bawaan. --}}
@php
    $p  = $site['color_primary'];
    $pd = $site['color_primary_dark'];
    $ac = $site['color_accent'];
@endphp
<style id="site-theme">
    :root {
        --brand: {{ $p }};
        --brand-deep: {{ $pd }};
        --amber: {{ $ac }};
        --ink: {{ $site['color_text_primary'] }};
        --mist: {{ $site['color_background'] }};
        --line: {{ $site['color_stroke'] }};
        --heading-color: {{ $site['color_text_primary'] }};
        --accent-color: {{ $p }};
        --nav-hover-color: {{ $ac }};
        --nav-dropdown-hover-color: {{ $p }};
        --bs-primary: {{ $p }};
        --bs-primary-rgb: {{ \App\Models\SiteSetting::rgb($p) }};
        --bs-link-color: {{ $p }};
    }
    .header .logo img.site-logo { max-height: 40px; width: auto; display: block; }
</style>
