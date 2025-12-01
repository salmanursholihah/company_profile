<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->only(['name', 'jabatan']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        Team::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team berhasil ditambahkan!');
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->only(['name', 'jabatan']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($team->image && file_exists(storage_path('app/public/' . $team->image))) {
                unlink(storage_path('app/public/' . $team->image));
            }

            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team berhasil diperbarui!');
    }

    public function destroy(Team $team)
    {
        if ($team->image && file_exists(storage_path('app/public/' . $team->image))) {
            unlink(storage_path('app/public/' . $team->image));
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team berhasil dihapus!');
    }
}
