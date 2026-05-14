<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Katalog;
use App\Models\ProfilSanggar;
use App\Models\Galeri;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Data berita
        $beritaUtama = Berita::where('status', 'tayang')->latest()->first();
        $beritaTerbaru = Berita::where('status', 'tayang')->latest()->skip(1)->take(3)->get();

        // Data event (belum selesai, diurutkan tanggal terdekat)
        $events = Event::where('status', 'belum selesai')
            ->orderBy('tanggal', 'asc')
            ->take(4)
            ->get();

        // Data katalog (tersedia)
        $katalogs = Katalog::where('status', 'tersedia')
            ->latest()
            ->take(6)
            ->get();

        // Data profil sanggar
        $profil = ProfilSanggar::with('logo', 'fotoPembina')->first();

        // Data galeri
        $galeri = Galeri::latest()->take(5)->get();

        // Untuk calendar (event days)
        $eventDays = Event::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->pluck('tanggal')
            ->map(function($date) {
                return Carbon::parse($date)->day;
            })
            ->toArray();

        $currentMonthName = Carbon::now()->translatedFormat('F');
        $currentYear = Carbon::now()->year;

        return view('umum.landing_page', compact(
            'beritaUtama', 'beritaTerbaru', 'events', 'katalogs', 
            'profil', 'galeri', 'eventDays', 'currentMonthName', 'currentYear'
        ));
    }
}