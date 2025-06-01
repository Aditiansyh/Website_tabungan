<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungan = Auth::user()->tabungan()->latest()->get();
        return view('tabungan.index', compact('tabungan'));
    }

    public function create()
    {
        return view('tabungan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'target_nominal' => 'required|integer',
            'target_tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('judul', 'target_nominal', 'target_tanggal');
        $data['user_id'] = Auth::id();
        $data['status'] = false;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tabungan', 'public');
        };

        $tabungan = Tabungan::create($data);
        $total = $tabungan->menabung()->sum('nominal');
        if ($total >= $tabungan->target_nominal) {
            $tabungan->update(['status' => true]);
        }
        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil dibuat');
    }

    public function edit(Tabungan $tabungan)
    {
        // Hanya bisa edit milik sendiri
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tabungan.edit', compact('tabungan'));
    }

    public function update(Request $request, Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required',
            'target_nominal' => 'required|integer',
            'target_tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->only('judul', 'target_nominal', 'target_tanggal', 'status');

        if ($request->hasFile('foto')) {
            // Hapus foto lama (jika ada)
            if ($tabungan->foto) {
                Storage::disk('public')->delete($tabungan->foto);
            }
            $data['foto'] = $request->file('foto')->store('tabungan', 'public');
        }

        $tabungan->update($data);
        $total = $tabungan->menabung()->sum('nominal');
        $status = $total >= $tabungan->target_nominal;

        $tabungan->update(['status' => $status]);
        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil diperbarui');
    }

    public function destroy(Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }

        if ($tabungan->foto) {
            Storage::disk('public')->delete($tabungan->foto);
        }

        $tabungan->delete();
        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil dihapus');
    }
}
