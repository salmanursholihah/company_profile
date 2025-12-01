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
        $data['useful_links'] = $request->useful_links
            ? array_map('trim', explode(',', $request->useful_links))
            : [];

        $data['our_services'] = $request->our_services
            ? array_map('trim', explode(',', $request->our_services))
            : [];

        // Convert JSON text to array
        $data['social_links'] = $request->social_links
            ? json_decode($request->social_links, true)
            : [];

        $footer->update($data);

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil diperbarui!');
    }
}
