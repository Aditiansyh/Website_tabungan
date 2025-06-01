<?php

namespace App\Http\Controllers;

use App\Models\Menabung;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenabungController extends Controller
{
    public function create($tabungan_id)
    {
        $tabungan = Tabungan::where('id', $tabungan_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('menabung.create', compact('tabungan'));
    }

    public function store(Request $request, $tabungan_id)
    {
        $request->validate([
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $tabungan = Tabungan::where('id', $tabungan_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        Menabung::create([
            'tabungan_id' => $tabungan->id,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
        ]);

        // Cek apakah sudah mencapai target
        $total = $tabungan->menabung()->sum('nominal');
        if ($total >= $tabungan->target_nominal) {
            $tabungan->update(['status' => true]);
        }

        return redirect()->route('tabungan.index')->with('success', 'Berhasil menabung');
    }

    public function riwayat($tabungan_id)
    {
        $tabungan = \App\Models\Tabungan::with('menabung')
            ->where('id', $tabungan_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('menabung.riwayat', compact('tabungan'));
    }

    public function formUmum()
    {
        $tabungans = Auth::user()->tabungan()->orderBy('judul')->get();
        return view('menabung.form-umum', compact('tabungans'));
    }

    public function storeUmum(Request $request)
    {
        $request->validate([
            'tabungan_id' => 'required|exists:tabungans,id',
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $tabungan = Auth::user()->tabungan()->where('id', $request->tabungan_id)->firstOrFail();

        $tabungan->menabung()->create([
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
        ]);

        // Cek apakah tercapai
        $total = $tabungan->menabung()->sum('nominal');
        if ($total >= $tabungan->target_nominal) {
            $tabungan->update(['status' => true]);
        }

        return redirect()->route('tabungan.index')->with('success', 'Berhasil menabung ke tujuan ' . $tabungan->judul);
    }
}