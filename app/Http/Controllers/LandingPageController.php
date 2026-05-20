<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\Katalog;
use App\Models\ProfilSanggar;
use App\Models\Berita;
use App\Models\Galeri;
use Carbon\Carbon; 

class LandingPageController extends Controller
{
    /**
     * Halaman Utama / Landing Page
     */
    public function index()
    {
        // 1. Ambil semua data dasar untuk Landing Page
        $profil = ProfilSanggar::first();
        $beritaUtama = Berita::where('status', 'tayang')->latest()->first();
        $beritaTerbaru = Berita::where('status', 'tayang')->latest()->take(3)->get();
        $katalogs = Katalog::take(6)->get();
        $galeri = Galeri::latest()->take(6)->get();
        $events = Event::latest()->get();

        // 2. LOGIKA KALENDER LANDING PAGE
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

        // 3. Kirim semua variabel ke View umum.landing_page
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

    /**
     * Halaman Kalender Event Lengkap Publik
     */
    public function allEvents()
    {
        // Mengambil semua data event diurutkan berdasarkan tanggal terdekat
        $events = Event::orderBy('tanggal', 'asc')->get();
        
        // Catatan: Perhitungan kalender bulanan sudah otomatis dihitung oleh Alpine.js di blade,
        // jadi di sini kita cukup mengirimkan data $events saja.
        return view('umum.event', compact('events'));
    }

    /**
     * Halaman Detail Event Publik saat Kartu Kalender diklik
     */
    public function eventDetail($id)
    {
        // Ambil data event yang diklik beserta gambar dari galeri
        $event = Event::with('galeri')->findOrFail($id);
        
        // Ambil 4 event lainnya untuk rekomendasi bagian sidebar "Event lain"
        $eventLain = Event::where('id', '!=', $id)->latest()->take(4)->get();

        return view('umum.event_detail', compact('event', 'eventLain'));
    }
}