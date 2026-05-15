<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\Katalog;
use App\Models\ProfilSanggar;
use App\Models\Berita;
use App\Models\Galeri;
use Carbon\Carbon; 
class HomeController extends Controller
{
    public function index()
{
    // 1. Ambil semua data dasar untuk Landing Page
    $profil = ProfilSanggar::first();
    $beritaUtama = Berita::where('status', 'tayang')->latest()->first();
    $beritaTerbaru = Berita::where('status', 'tayang')->latest()->take(3)->get();
    $katalogs = Katalog::take(6)->get();
    $galeri = Galeri::latest()->take(6)->get();
    $events = Event::latest()->get();

    // 2. LOGIKA KALENDER
    // Ambil angka tanggal saja (1-31) dari database untuk ditandai merah
    $eventDays = $events->map(function($event) {
        return Carbon::parse($event->tanggal)->format('j');
    })->unique()->toArray();

    // Tentukan bulan dan tahun yang ingin ditampilkan (Sekarang: Mei 2026)
    $targetDate = Carbon::create(2026, 5, 1);
    
    // Hitung jumlah hari kosong di awal bulan (0 = Minggu, 5 = Jumat)
    $blankDays = $targetDate->dayOfWeek; 
    
    // Hitung total hari dalam bulan tersebut (Mei = 31)
    $daysInMonth = $targetDate->daysInMonth;

    // 3. Kirim semua variabel ke View
    // Pastikan semua nama di dalam compact() sama persis dengan nama variabel di atas
    return view('umum.landing_page', compact(
        'profil', 
        'beritaUtama', 
        'beritaTerbaru', 
        'katalogs', 
        'galeri', 
        'events', 
        'eventDays', 
        'blankDays', 
        'daysInMonth'
    ));
}
};