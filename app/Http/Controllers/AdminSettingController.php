<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * Admin > Setting: logo, warna, dan teks yang dipakai web DAN aplikasi mobile.
 * Form dibangun otomatis dari config/site_settings.php.
 */
class AdminSettingController extends Controller
{
    public function index()
    {
        return view('admin.setting', [
            'groups'   => config('site_settings.groups'),
            'fields'   => SiteSetting::definitions(),
            'values'   => SiteSetting::values(),
            'defaults' => collect(SiteSetting::definitions())->map(fn ($d) => $d['default'] ?? null)->all(),
        ]);
    }

    public function update(Request $request)
    {
        $group  = $request->input('group');
        $groups = config('site_settings.groups');
        abort_unless(isset($groups[$group]), 422, 'Grup tidak dikenal.');

        $fields = collect(SiteSetting::definitions())->filter(fn ($d) => $d['group'] === $group);

        // ---------- validasi dinamis ----------
        $rules = [];
        foreach ($fields as $key => $def) {
            switch ($def['type']) {
                case 'text':
                case 'textarea':
                    $rules[$key] = ['nullable', 'string', 'max:' . ($def['max'] ?? 255)];
                    break;
                case 'color':
                    $rules[$key] = ['required', 'regex:/^#[0-9a-fA-F]{6}$/'];
                    break;
                case 'bool':
                    $rules[$key] = ['nullable', 'boolean'];
                    break;
                case 'image':
                    $rules[$key] = ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg,ico', 'max:' . ($def['max_kb'] ?? 2048)];
                    break;
                case 'list':
                    $rules[$key] = ['nullable', 'array', 'max:' . ($def['max_rows'] ?? 20)];
                    foreach ($def['columns'] as $col => $cdef) {
                        $rules["$key.*.$col"] = ['nullable', 'string', 'max:' . ($cdef['max'] ?? 255)];
                    }
                    break;
            }
        }

        $labels = $fields->mapWithKeys(fn ($d, $k) => [$k => $d['label']])->all();
        $validated = Validator::make($request->all(), $rules, [
            'regex' => ':attribute harus berupa kode warna heksa, mis. #12808f.',
        ], $labels)->validate();

        // ---------- simpan ----------
        foreach ($fields as $key => $def) {
            switch ($def['type']) {
                case 'bool':
                    SiteSetting::put($key, $request->boolean($key));
                    break;

                case 'color':
                    SiteSetting::put($key, strtolower($validated[$key]));
                    break;

                case 'image':
                    $old = SiteSetting::values()[$key] ?? null;

                    if ($request->hasFile($key)) {
                        $path = $request->file($key)->store('settings', 'public');
                        SiteSetting::put($key, $path);
                        $this->deleteOld($old);
                    } elseif ($request->boolean("remove_$key")) {
                        SiteSetting::put($key, null);
                        $this->deleteOld($old);
                    }
                    break;

                case 'list':
                    $rows = collect($request->input($key, []))
                        ->map(fn ($row) => collect($def['columns'])->keys()->mapWithKeys(
                            fn ($c) => [$c => trim((string) ($row[$c] ?? ''))]
                        )->all())
                        ->filter(fn ($row) => collect($row)->filter()->isNotEmpty())
                        ->values()
                        ->all();
                    SiteSetting::put($key, $rows);
                    break;

                default: // text, textarea
                    SiteSetting::put($key, isset($validated[$key]) ? trim($validated[$key]) : null);
            }
        }

        SiteSetting::flush();

        return redirect()
            ->to(route('admin.setting', ['tab' => $group]) . '#tab-' . $group)
            ->with('success', 'Pengaturan "' . $groups[$group]['label'] . '" disimpan. Web langsung berubah; aplikasi mobile memuat versi baru saat dibuka.');
    }

    /** Kembalikan satu grup ke nilai bawaan. */
    public function reset(Request $request)
    {
        $group = $request->input('group');
        abort_unless(isset(config('site_settings.groups')[$group]), 422);

        SiteSetting::resetGroup($group);

        return redirect()
            ->to(route('admin.setting', ['tab' => $group]) . '#tab-' . $group)
            ->with('success', 'Grup dikembalikan ke pengaturan bawaan.');
    }

    private function deleteOld(?string $path): void
    {
        // hanya hapus file yang memang dikelola menu ini (folder settings/)
        if ($path && str_starts_with($path, 'settings/')) {
            Storage::disk('public')->delete($path);
        }
    }
}
