<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tabungan;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $tabungan = Auth::user()->tabungan()->with('menabung')->get();

        $jumlahTercapai = $tabungan->where('status', true)->count();
        $jumlahBelum = $tabungan->where('status', false)->count();
        $totalDitabung = $tabungan->sum(fn($t) => $t->menabung->sum('nominal'));

        // Untuk bar chart
        $labels = [];
        $totals = [];

        foreach ($tabungan as $t) {
            $labels[] = $t->judul;
            $totals[] = $t->menabung->sum('nominal');
        }

        return view('home', compact(
        'tabungan',
        'jumlahTercapai',
        'jumlahBelum',
        'totalDitabung',
        'labels',
        'totals'
    ));
    }
}
