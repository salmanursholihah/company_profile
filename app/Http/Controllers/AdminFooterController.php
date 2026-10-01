<?php
namespace App\Http\Controllers;

use App\Models\Footer;
use App\Http\Requests\FooterRequest;

class AdminFooterController extends Controller
{
    /** Platform sosial media yang bisa diisi dari admin (urutan = urutan tampil di footer) */
    private const SOCIALS = ['whatsapp', 'instagram', 'facebook', 'twitter', 'linkedin', 'tiktok', 'youtube'];

    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }

    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(FooterRequest $request, Footer $footer)
    {
        $data = $request->validated();

        // Useful links: satu baris satu link, format "Nama | /url"
        $links = [];
        foreach (preg_split('/\r\n|\r|\n/', (string) $request->useful_links) as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            [$name, $url] = array_pad(array_map('trim', explode('|', $line, 2)), 2, '#');
            $links[] = ['name' => $name, 'url' => $url !== '' ? $url : '#'];
        }
        $data['useful_links'] = $links;

        // Our services: pisahkan dengan koma
        $data['our_services'] = $request->our_services
            ? array_map('trim', explode(',', $request->our_services))
            : [];

        // Sosial media: dari kolom terpisah. Key lain yang sudah ada di database tetap dipertahankan.
        $existing = $footer->social_links ?? [];
        $social = [];
        foreach (self::SOCIALS as $key) {
            $value = trim((string) $request->input($key));

            if ($key === 'whatsapp') {
                // Nomor: hanya digit, format 62xxx
                $value = preg_replace('/\D/', '', $value);
                if ($value !== '' && str_starts_with($value, '0')) {
                    $value = '62' . substr($value, 1);
                }
            } elseif ($value !== '' && !preg_match('#^https?://#i', $value)) {
                $value = 'https://' . $value;
            }

            if ($value !== '') {
                $social[$key] = $value;
            }
            unset($existing[$key], $data[$key]);
        }
        $data['social_links'] = $social + $existing;

        $footer->update($data);

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil diperbarui!');
    }
}
