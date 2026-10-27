@extends('layouts.admin')

@section('title', 'Pengaturan Situs')
@section('page-title', 'Setting')

@section('content')
@php
    // old('group') terisi bila validasi gagal -> tetap di tab yang barusan disimpan
    $activeTab = old('group', request('tab', array_key_first($groups)));
    if (!isset($groups[$activeTab])) { $activeTab = array_key_first($groups); }
@endphp

<div class="mb-3">
    <h3 class="mb-1">Pengaturan Situs</h3>
    <p class="text-muted mb-0">
        Logo, warna, dan teks di sini dipakai oleh <strong>website</strong> dan <strong>aplikasi mobile</strong> sekaligus —
        tidak perlu mengubah kode.
    </p>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Periksa kembali isian:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    </div>
@endif

<ul class="nav nav-tabs mb-3" role="tablist">
    @foreach ($groups as $gKey => $g)
        <li class="nav-item">
            <a class="nav-link {{ $gKey === $activeTab ? 'active' : '' }}" data-setting-tab="{{ $gKey }}" href="#tab-{{ $gKey }}" role="tab">
                {{ $g['label'] }}
            </a>
        </li>
    @endforeach
</ul>

<div class="tab-content">
@foreach ($groups as $gKey => $g)
    <div class="tab-pane fade {{ $gKey === $activeTab ? 'show active' : '' }}" id="tab-{{ $gKey }}" role="tabpanel">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-muted">{{ $g['hint'] }}</p>

                @if ($gKey === 'colors')
                    {{-- Pratinjau warna langsung --}}
                    <div id="colorPreview" class="mb-4 p-3 rounded" style="border:1px solid #ddd">
                        <div class="d-flex flex-wrap align-items-center">
                            <div id="pvCard" class="p-3 mr-3 mb-2 rounded" style="min-width:230px">
                                <div id="pvTitle" class="font-weight-bold">Judul contoh</div>
                                <div id="pvText" class="small">Teks sekunder contoh pada kartu.</div>
                                <div class="mt-2">
                                    <span id="pvBtn" class="d-inline-block px-3 py-1 rounded font-weight-bold small">Tombol CTA</span>
                                    <span id="pvBtn2" class="d-inline-block px-3 py-1 rounded font-weight-bold small ml-1">Utama</span>
                                </div>
                            </div>
                            <small class="text-muted">Pratinjau — berubah saat Anda mengganti warna.</small>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="group" value="{{ $gKey }}">

                    <div class="{{ $gKey === 'colors' ? 'row' : '' }}">
                    @foreach ($fields as $key => $f)
                        @continue($f['group'] !== $gKey)
                        @php $val = $values[$key] ?? null; @endphp

                        {{-- ============ COLOR ============ --}}
                        @if ($f['type'] === 'color')
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold mb-1" for="f-{{ $key }}">{{ $f['label'] }}</label>
                                <div class="input-group">
                                    <input type="color" class="form-control p-1 color-pick" style="max-width:60px;height:38px"
                                           value="{{ old($key, $val) }}" data-target="f-{{ $key }}">
                                    <input type="text" class="form-control color-hex" id="f-{{ $key }}" name="{{ $key }}"
                                           value="{{ old($key, $val) }}" maxlength="7" data-default="{{ $f['default'] }}"
                                           data-key="{{ $key }}" pattern="^#[0-9a-fA-F]{6}$">
                                </div>
                                @if (!empty($f['help'])) <small class="text-muted">{{ $f['help'] }}</small> @endif
                            </div>

                        {{-- ============ IMAGE ============ --}}
                        @elseif ($f['type'] === 'image')
                            @php $url = $val ? \App\Support\Media::url($val) : null; @endphp
                            <div class="form-group">
                                <label class="font-weight-bold">{{ $f['label'] }}</label>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3 p-2 rounded text-center"
                                         style="width:140px;height:90px;border:1px dashed #bbb;background:#f6f6f6;display:flex;align-items:center;justify-content:center">
                                        <img id="prev-{{ $key }}" src="{{ $url }}" alt=""
                                             style="max-width:100%;max-height:100%;{{ $url ? '' : 'display:none' }}">
                                        @unless ($url) <span class="small text-muted" id="none-{{ $key }}">Belum ada</span> @endunless
                                    </div>
                                    <div>
                                        <input type="file" name="{{ $key }}" accept="image/*" class="mb-2 img-input" data-prev="prev-{{ $key }}">
                                        @if ($url)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rm-{{ $key }}" name="remove_{{ $key }}" value="1">
                                                <label class="custom-control-label small" for="rm-{{ $key }}">Hapus gambar ini</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if (!empty($f['help'])) <small class="text-muted">{{ $f['help'] }}</small> @endif
                            </div>

                        {{-- ============ BOOL ============ --}}
                        @elseif ($f['type'] === 'bool')
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="f-{{ $key }}" name="{{ $key }}" value="1"
                                       {{ old($key, $val) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="f-{{ $key }}">{{ $f['label'] }}</label>
                            </div>

                        {{-- ============ LIST ============ --}}
                        @elseif ($f['type'] === 'list')
                            @php $rows = old($key, $val ?: []); @endphp
                            <div class="form-group list-field" data-key="{{ $key }}" data-max="{{ $f['max_rows'] ?? 20 }}">
                                <label class="font-weight-bold">{{ $f['label'] }}</label>
                                @if (!empty($f['help'])) <div><small class="text-muted">{{ $f['help'] }}</small></div> @endif
                                <div class="list-rows mt-2">
                                    @foreach ($rows as $i => $row)
                                        <div class="list-row border rounded p-2 mb-2 d-flex align-items-start">
                                            <div class="flex-grow-1 row">
                                                @foreach ($f['columns'] as $col => $c)
                                                    <div class="col-md mb-1">
                                                        @if (($c['type'] ?? 'text') === 'textarea')
                                                            <textarea class="form-control" rows="2" name="{{ $key }}[{{ $i }}][{{ $col }}]" placeholder="{{ $c['label'] }}">{{ $row[$col] ?? '' }}</textarea>
                                                        @else
                                                            <input type="text" class="form-control" name="{{ $key }}[{{ $i }}][{{ $col }}]" value="{{ $row[$col] ?? '' }}" placeholder="{{ $c['label'] }}">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger ml-2 row-del" title="Hapus baris">&times;</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary row-add">+ Tambah baris</button>

                                <template class="row-tpl">
                                    <div class="list-row border rounded p-2 mb-2 d-flex align-items-start">
                                        <div class="flex-grow-1 row">
                                            @foreach ($f['columns'] as $col => $c)
                                                <div class="col-md mb-1">
                                                    @if (($c['type'] ?? 'text') === 'textarea')
                                                        <textarea class="form-control" rows="2" name="{{ $key }}[__I__][{{ $col }}]" placeholder="{{ $c['label'] }}"></textarea>
                                                    @else
                                                        <input type="text" class="form-control" name="{{ $key }}[__I__][{{ $col }}]" placeholder="{{ $c['label'] }}">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-danger ml-2 row-del" title="Hapus baris">&times;</button>
                                    </div>
                                </template>
                            </div>

                        {{-- ============ TEXT / TEXTAREA ============ --}}
                        @else
                            <div class="form-group">
                                <label class="font-weight-bold" for="f-{{ $key }}">{{ $f['label'] }}</label>
                                @if ($f['type'] === 'textarea')
                                    <textarea class="form-control" id="f-{{ $key }}" name="{{ $key }}" rows="3" maxlength="{{ $f['max'] ?? 255 }}">{{ old($key, $val) }}</textarea>
                                @else
                                    <input type="text" class="form-control" id="f-{{ $key }}" name="{{ $key }}" value="{{ old($key, $val) }}" maxlength="{{ $f['max'] ?? 255 }}">
                                @endif
                                @if (!empty($f['help'])) <small class="text-muted">{{ $f['help'] }}</small> @endif
                            </div>
                        @endif
                    @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan {{ $g['label'] }}</button>
                </form>

                <form method="POST" action="{{ route('admin.setting.reset') }}" class="mt-3"
                      onsubmit="return confirm('Kembalikan grup &quot;{{ $g['label'] }}&quot; ke pengaturan bawaan?')">
                    @csrf
                    <input type="hidden" name="group" value="{{ $gKey }}">
                    <button type="submit" class="btn btn-link btn-sm text-danger p-0">Kembalikan ke bawaan</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

<script>
(function () {
    /* ---- tab pengaturan: klik, dan buka langsung lewat URL hash (#tab-colors, #tab-brand, ...) ---- */
    var tabLinks = document.querySelectorAll('[data-setting-tab]');
    var panes = document.querySelectorAll('.tab-content > .tab-pane');
    function openTab(key, pushHash) {
        var pane = document.getElementById('tab-' + key);
        if (!pane) return false;
        tabLinks.forEach(function (a) { a.classList.toggle('active', a.dataset.settingTab === key); });
        panes.forEach(function (p) {
            var on = p === pane;
            p.classList.toggle('active', on);
            p.classList.toggle('show', on);
        });
        if (pushHash && window.history && history.replaceState) {
            history.replaceState(null, '', '#tab-' + key);
        }
        return true;
    }
    tabLinks.forEach(function (a) {
        a.addEventListener('click', function (e) {
            e.preventDefault();
            openTab(a.dataset.settingTab, true);
        });
    });
    function fromHash() {
        var m = /^#tab-([A-Za-z0-9_-]+)$/.exec(window.location.hash || '');
        if (m) openTab(m[1], false);
    }
    window.addEventListener('hashchange', fromHash);
    fromHash(); // hash di URL menang atas ?tab=

    /* ---- sinkron color picker <-> kolom hex + pratinjau ---- */
    function val(key, fb) { var el = document.getElementById('f-' + key); return (el && /^#[0-9a-fA-F]{6}$/.test(el.value)) ? el.value : fb; }
    function paint() {
        var c = function (k, d) { return val(k, d); };
        var card = document.getElementById('pvCard'); if (!card) return;
        card.style.background = c('color_surface', '#fff');
        card.style.border = '1px solid ' + c('color_stroke', '#ddd');
        document.getElementById('colorPreview').style.background = c('color_background', '#f5fafb');
        var t = document.getElementById('pvTitle'); t.style.color = c('color_primary_dark', '#0b4a56');
        document.getElementById('pvText').style.color = c('color_text_secondary', '#6b8a91');
        var b = document.getElementById('pvBtn'); b.style.background = c('color_accent', '#f2b134'); b.style.color = c('color_on_accent', '#0b4a56');
        var b2 = document.getElementById('pvBtn2'); b2.style.background = c('color_primary', '#12808f'); b2.style.color = c('color_on_primary', '#fff');
    }
    document.querySelectorAll('.color-pick').forEach(function (p) {
        var t = document.getElementById(p.dataset.target);
        p.addEventListener('input', function () { t.value = p.value; paint(); });
        t.addEventListener('input', function () { if (/^#[0-9a-fA-F]{6}$/.test(t.value)) { p.value = t.value; } paint(); });
    });
    paint();

    /* ---- preview upload gambar ---- */
    document.querySelectorAll('.img-input').forEach(function (inp) {
        inp.addEventListener('change', function () {
            var f = inp.files && inp.files[0]; if (!f) return;
            var img = document.getElementById(inp.dataset.prev);
            img.src = URL.createObjectURL(f); img.style.display = '';
            var none = document.getElementById(inp.dataset.prev.replace('prev-', 'none-')); if (none) none.style.display = 'none';
        });
    });

    /* ---- daftar berulang ---- */
    document.querySelectorAll('.list-field').forEach(function (box) {
        var rows = box.querySelector('.list-rows'), tpl = box.querySelector('.row-tpl'), max = +box.dataset.max;
        var next = rows.children.length + 100; // indeks unik untuk baris baru
        box.querySelector('.row-add').addEventListener('click', function () {
            if (rows.children.length >= max) { alert('Maksimal ' + max + ' baris.'); return; }
            var html = tpl.innerHTML.replace(/__I__/g, next++);
            rows.insertAdjacentHTML('beforeend', html);
        });
        box.addEventListener('click', function (e) {
            if (e.target.classList.contains('row-del')) { e.target.closest('.list-row').remove(); }
        });
    });
})();
</script>
@endsection
