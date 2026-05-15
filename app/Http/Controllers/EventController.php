<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Event::with('galeri', 'user');
    if ($request->filled('search')) {
        $query->where('nama_event', 'like', '%' . $request->search . '%');
    }
    $events = $query->latest()->paginate(10);

    $totalEvent = Event::count();
    $selesai = Event::where('status', 'selesai')->count();
    $belumSelesai = Event::where('status', 'belum selesai')->count();

    return view('superadmin.event.index', compact('events', 'totalEvent', 'selesai', 'belumSelesai'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_event' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'jam' => 'required',
        'lokasi' => 'required|string',
        'kategori' => 'required|string',
        'status' => 'required|in:selesai,belum selesai',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $galeriId = null;
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileBlob = file_get_contents($file->getRealPath());
        $galeri = Galeri::create([
            'file_blob' => $fileBlob,
            'nama_file' => $file->getClientOriginalName(),
            'kategori_modul' => 'event',
            'is_watermark' => false,
        ]);
        $galeriId = $galeri->id;
    }

    Event::create([
        'nama_event' => $request->nama_event,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'lokasi' => $request->lokasi,
        'kategori' => $request->kategori,
        'status' => $request->status,
        'user_id' => Auth::id(), 
        'galeri_id' => $galeriId,
    ]);

    return redirect()->route('superadmin.kelola-event')->with('success', 'Event berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with('galeri')->findOrFail($id);
        return view('superadmin.detail-event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $event = Event::with('galeri')->findOrFail($id);
    return view('superadmin.event.update', compact('event'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'lokasi' => 'required|string',
            'kategori' => 'required|string',
            'status' => 'required|in:selesai,belum selesai',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileBlob = file_get_contents($file->getRealPath());

            if ($event->galeri_id) {
                $galeri = Galeri::find($event->galeri_id);
                $galeri->update([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                ]);
            } else {
                $galeri = Galeri::create([
                    'file_blob' => $fileBlob,
                    'nama_file' => $file->getClientOriginalName(),
                    'kategori_modul' => 'event',
                    'is_watermark' => false,
                ]);
                $event->galeri_id = $galeri->id;
            }
        }

        $event->update([
            'nama_event' => $request->nama_event,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);

        return redirect()->route('superadmin.kelola-event')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->galeri_id) {
            Galeri::find($event->galeri_id)?->delete();
        }
        $event->delete();

        return redirect()->route('superadmin.kelola-event')->with('success', 'Event berhasil dihapus.');
    }
}