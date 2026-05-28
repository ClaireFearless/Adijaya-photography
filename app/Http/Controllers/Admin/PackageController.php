<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'dp_amount'   => 'required|numeric|min:0',
            'duration'    => 'required|integer|min:1',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('thumbnail');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                                    ->store('packages', 'public');
        }

        Package::create($data);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'dp_amount'   => 'required|numeric|min:0',
            'duration'    => 'required|integer|min:1',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('thumbnail');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama kalau ada
            if ($package->thumbnail) {
                Storage::disk('public')->delete($package->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')
                                    ->store('packages', 'public');
        }

        $package->update($data);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil diupdate!');
    }

    public function destroy(Package $package)
    {
        if ($package->thumbnail) {
            Storage::disk('public')->delete($package->thumbnail);
        }
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil dihapus!');
    }
}