<?php
namespace App\Http\Controllers;

use App\Models\Footer;
use App\Http\Requests\FooterRequest;

class AdminFooterController extends Controller
{
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

        // Convert comma-separated strings to arrays
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

        $data['our_services'] = $request->our_services
            ? array_map('trim', explode(',', $request->our_services))
            : [];

        // Convert JSON text to array
        $data['social_links'] = $request->social_links
            ? json_decode($request->social_links, true)
            : [];

        // Nomor WhatsApp: simpan ke social_links['whatsapp'] (hanya digit, format 62xxx)
        $wa = preg_replace('/\D/', '', (string) $request->whatsapp);
        if ($wa !== '' && str_starts_with($wa, '0')) {
            $wa = '62' . substr($wa, 1);
        }
        if ($wa !== '') {
            $data['social_links']['whatsapp'] = $wa;
        } else {
            unset($data['social_links']['whatsapp']);
        }
        unset($data['whatsapp']);

        $footer->update($data);

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil diperbarui!');
    }
}
