<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="{{ $site['color_primary'] ?? '#0f766e' }}">
    <title>@yield('title') - {{ $site['brand_name'] }}</title>
    @if (!empty($siteFaviconUrl))<link rel="icon" href="{{ $siteFaviconUrl }}">@endif

    {{-- Warna mengikuti Admin > Setting Situs --}}
    @include('partials.site-theme')
    <style>
        :root{--l-brand:var(--brand,#0f766e);--l-deep:var(--brand-deep,#134e4a);--l-ring:color-mix(in srgb,var(--l-brand) 22%,transparent)}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        html,body{height:100%}
        body{
            font-family:"Inter",system-ui,-apple-system,"Segoe UI",Roboto,Arial,sans-serif;font-size:15px;line-height:1.5;color:#0f172a;
            background:#f4f6fb;-webkit-font-smoothing:antialiased;
        }
        .au{min-height:100vh;min-height:100dvh;display:grid;grid-template-columns:1fr}
        @media (min-width:900px){.au{grid-template-columns:minmax(0,5fr) minmax(0,6fr)}}

        /* ---- Panel brand ---- */
        .au-brand{
            position:relative;overflow:hidden;color:#fff;display:flex;flex-direction:column;justify-content:space-between;
            padding:1.4rem 1.4rem 2.6rem;padding-top:calc(1.4rem + env(safe-area-inset-top,0px));
            background:linear-gradient(150deg,var(--l-brand),var(--l-deep));
        }
        .au-brand::before,.au-brand::after{content:"";position:absolute;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
        .au-brand::before{width:340px;height:340px;right:-120px;top:-110px}
        .au-brand::after{width:260px;height:260px;left:-90px;bottom:-110px}
        .au-logo{display:flex;align-items:center;gap:.75rem;position:relative;z-index:1}
        .au-logo img{max-height:44px;max-width:190px;object-fit:contain;filter:drop-shadow(0 2px 6px rgba(0,0,0,.2))}
        .au-logo-mark{width:44px;height:44px;border-radius:13px;background:rgba(255,255,255,.18);display:grid;place-items:center;font-weight:800;font-size:1.2rem}
        .au-logo b{font-size:1.1rem;letter-spacing:.2px}
        .au-pitch{position:relative;z-index:1;margin-top:1.4rem;max-width:420px}
        .au-pitch h2{font-size:1.45rem;line-height:1.25;font-weight:800;letter-spacing:-.01em}
        .au-pitch p{margin-top:.55rem;opacity:.85;font-size:.95rem}
        .au-points{display:none;list-style:none;margin-top:1.6rem;gap:.7rem}
        .au-points li{display:flex;gap:.6rem;align-items:center;font-size:.92rem;opacity:.92}
        .au-points svg{width:20px;height:20px;flex:none;padding:3px;border-radius:50%;background:rgba(255,255,255,.2)}
        @media (min-width:900px){
            .au-brand{padding:2.5rem 3rem;min-height:100vh}
            .au-pitch{margin-top:0}
            .au-pitch h2{font-size:2.1rem}
            .au-points{display:grid}
            .au-copy{display:block!important}
        }
        .au-copy{display:none;position:relative;z-index:1;font-size:.8rem;opacity:.7}

        /* ---- Panel form ---- */
        .au-form-wrap{display:flex;align-items:center;justify-content:center;padding:1.25rem 1rem 2rem;margin-top:-1.4rem;position:relative;z-index:2}
        @media (min-width:900px){.au-form-wrap{padding:2.5rem;margin-top:0}}
        .au-card{
            width:100%;max-width:440px;background:#fff;border:1px solid #e6e9f0;border-radius:20px;padding:1.5rem;
            box-shadow:0 18px 45px -20px rgba(15,23,42,.25);
        }
        @media (min-width:480px){.au-card{padding:2.2rem}}
        @media (min-width:900px){.au-card{border:0;box-shadow:none;background:transparent;padding:0}}
        .au-card h1{font-size:1.6rem;font-weight:800;letter-spacing:-.02em;line-height:1.2}
        .au-sub{color:#64748b;margin:.4rem 0 1.4rem;font-size:.95rem}

        .au-alert{display:flex;gap:.55rem;padding:.75rem .9rem;border-radius:12px;font-size:.88rem;margin-bottom:1rem;border:1px solid;border-left-width:4px}
        .au-alert.ok{background:#ecfdf5;border-color:#34d399;color:#065f46}
        .au-alert.err{background:#fef2f2;border-color:#f87171;color:#991b1b}

        .au-field{margin-bottom:1rem}
        .au-field label{display:block;font-size:.84rem;font-weight:600;color:#334155;margin-bottom:.4rem}
        .au-input{position:relative}
        .au-input > svg.lead{position:absolute;left:.9rem;top:50%;transform:translateY(-50%);width:19px;height:19px;color:#94a3b8;pointer-events:none}
        .au-input input{
            width:100%;min-height:50px;padding:.75rem 2.9rem .75rem 2.65rem;font:inherit;font-size:16px;color:#0f172a;background:#fff;
            border:1px solid #d5dbe6;border-radius:12px;transition:border-color .15s,box-shadow .15s;appearance:none;-webkit-appearance:none;
        }
        .au-input input::placeholder{color:#a3aec2}
        .au-input input:focus{outline:0;border-color:var(--l-brand);box-shadow:0 0 0 4px var(--l-ring)}
        .au-input input.is-bad{border-color:#ef4444}
        .au-eye{position:absolute;right:.35rem;top:50%;transform:translateY(-50%);width:42px;height:42px;border:0;background:none;border-radius:10px;color:#94a3b8;cursor:pointer;display:grid;place-items:center}
        .au-eye:hover{color:var(--l-brand)}
        .au-eye svg{width:20px;height:20px}
        .au-err{color:#dc2626;font-size:.8rem;margin-top:.35rem;display:block}

        .au-btn{
            width:100%;min-height:52px;margin-top:.4rem;border:0;border-radius:12px;background:var(--l-brand);color:#fff;font:inherit;
            font-size:1rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:.6rem;
            box-shadow:0 12px 24px -12px var(--l-brand);transition:filter .15s,transform .05s;
        }
        .au-btn:hover{filter:brightness(.94)}
        .au-btn:active{transform:translateY(1px)}
        .au-btn:focus-visible{outline:0;box-shadow:0 0 0 4px var(--l-ring)}
        .au-btn[disabled]{opacity:.75;cursor:progress}
        .au-spin{width:18px;height:18px;border:2.5px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:au-s .7s linear infinite;display:none}
        .au-btn.is-load .au-spin{display:block}
        @keyframes au-s{to{transform:rotate(360deg)}}

        .au-switch{margin-top:1.4rem;text-align:center;color:#64748b;font-size:.92rem}
        .au-switch a{color:var(--l-brand);font-weight:700;text-decoration:none}
        .au-switch a:hover{text-decoration:underline}
        .au-back{display:block;margin-top:.9rem;text-align:center;font-size:.84rem;color:#94a3b8;text-decoration:none}
        .au-back:hover{color:var(--l-brand)}
        @media (prefers-reduced-motion:reduce){.au-spin{animation-duration:1.6s}}
    </style>
</head>

<body>
    @php
        $check = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5 9-10"/></svg>';
    @endphp
    <div class="au">
        <section class="au-brand">
            <div class="au-logo">
                @if ($siteLogoUrl)
                    <img src="{{ $siteLogoUrl }}" alt="{{ $site['brand_name'] }}">
                @else
                    <span class="au-logo-mark">{{ strtoupper(mb_substr($site['brand_name'], 0, 1)) }}</span>
                    <b>{{ $site['brand_name'] }}</b>
                @endif
            </div>

            <div class="au-pitch">
                <h2>@yield('pitch', 'Kelola konten website dengan mudah.')</h2>
                <p>@yield('pitch_sub', 'Satu panel untuk produk, katalog, artikel, dan pesan masuk.')</p>
                <ul class="au-points">
                    <li>{!! $check !!} Produk &amp; katalog selalu terbarui</li>
                    <li>{!! $check !!} Pesan pelanggan terkumpul rapi</li>
                    <li>{!! $check !!} Bisa diakses dari HP maupun komputer</li>
                </ul>
            </div>

            <div class="au-copy">&copy; {{ date('Y') }} {{ $site['brand_name'] }}</div>
        </section>

        <main class="au-form-wrap">
            <div class="au-card">
                <h1>@yield('heading')</h1>
                <p class="au-sub">@yield('subheading')</p>

                @if (session('success'))
                    <div class="au-alert ok" role="status">{{ session('success') }}</div>
                @endif

                @yield('content')

                <div class="au-switch">@yield('switch')</div>
                <a class="au-back" href="{{ url('/') }}">&larr; Kembali ke website</a>
            </div>
        </main>
    </div>

    <script>
        // Tampil/sembunyi password
        document.querySelectorAll('[data-eye]').forEach(function (b) {
            b.addEventListener('click', function () {
                var i = document.getElementById(b.getAttribute('data-eye'));
                var show = i.type === 'password';
                i.type = show ? 'text' : 'password';
                b.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
                b.style.color = show ? 'var(--l-brand)' : '';
            });
        });
        // Status loading saat submit (cegah klik ganda)
        document.querySelectorAll('form[data-auth]').forEach(function (f) {
            f.addEventListener('submit', function () {
                var btn = f.querySelector('.au-btn');
                if (!btn || btn.disabled) return;
                setTimeout(function () { btn.disabled = true; btn.classList.add('is-load'); }, 0);
            });
        });
        // Aman bila halaman dikembalikan dari cache (tombol Back)
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) document.querySelectorAll('.au-btn').forEach(function (b) { b.disabled = false; b.classList.remove('is-load'); });
        });
    </script>
</body>

</html>
