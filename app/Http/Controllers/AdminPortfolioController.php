<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
class AdminPortfolioController extends Controller
{
       public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'category'  => 'required',
            'description' => 'nullable',
            'image'     => 'nullable|image'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('portfolios', 'public');
        }

        Portfolio::create([
            'name'        => $request->name,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $image,
        ]);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio added successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'name'      => 'required',
            'category'  => 'required',
            'description' => 'nullable',
            'image'     => 'nullable|image'
        ]);

        $image = $portfolio->image;
        if ($request->hasFile('image')) {

            // delete old image
            if ($portfolio->image && file_exists(storage_path('app/public/' . $portfolio->image))) {
                unlink(storage_path('app/public/' . $portfolio->image));
            }

            $image = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update([
            'name'        => $request->name,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $image,
        ]);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && file_exists(storage_path('app/public/' . $portfolio->image))) {
            unlink(storage_path('app/public/' . $portfolio->image));
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}
