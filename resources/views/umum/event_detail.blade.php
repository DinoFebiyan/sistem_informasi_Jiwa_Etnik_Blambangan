@extends('layouts.umum')

@section('title', $event->nama_event . ' — JEB')

@push('styles')
<style>
    .detail-container { padding: 4rem 8%; background: #fff; font-family: 'Poppins', sans-serif; }

    /* ══ MAIN CARD ══ */
    .main-event-card {
        background: #fff; border-radius: 20px; overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08); margin-bottom: 4rem;
    }
    .hero-wrapper { position: relative; width: 100%; height: 500px; }
    .hero-wrapper img { width: 100%; height: 100%; object-fit: cover; }
    
    .cat-badge {
        position: absolute; top: 20px; left: 20px;
        background: #EFFF00; color: #000; padding: 5px 20px;
        border-radius: 50px; font-weight: 700; font-size: 0.8rem;
    }

    .info-area { padding: 3rem; display: grid; grid-template-columns: 1fr 250px; gap: 30px; }
    .info-area h1 { font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 15px; color: #000; }
    .info-area p { color: #555; line-height: 1.8; font-size: 1.1rem; }
    
    .meta-side { text-align: right; border-left: 1px solid #eee; padding-left: 30px; }
    .meta-side h3 { font-size: 1.2rem; margin-bottom: 5px; }
    .meta-side span { color: #888; display: block; margin-bottom: 20px; }

    /* ══ EVENT LAIN ══ */
    .other-section h2 { font-family: 'Playfair Display'; font-size: 2.8rem; color: #5a1a1a; margin-bottom: 2rem; }
    .other-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
    
    .small-card {
        display: flex; gap: 20px; padding: 20px; border-radius: 15px;
        border: 1px solid #eee; transition: 0.3s; align-items: center;
    }
    .small-card:hover { transform: translateY(-5px); border-color: #b91c1c; }
    .date-sq { background: #5a1a1a; color: #fff; padding: 15px; border-radius: 10px; min-width: 70px; text-align: center; }
</style>
@endpush

@section('content')
<div class="detail-container">
    <div class="main-event-card">
        <div class="hero-wrapper">
            <span class="cat-badge">{{ $event->kategori }}</span>
            @if($event->galeri)
                <img src="data:image/jpeg;base64,{{ base64_encode($event->galeri->file_blob) }}" alt="">
            @else
                <img src="{{ asset('img/default-event.jpg') }}" alt="">
            @endif
        </div>
        <div class="info-area">
            <div>
                <h1>{{ $event->nama_event }}</h1>
                <p>{{ $event->deskripsi }}</p>
            </div>
            <div class="meta-side">
                <h3>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</h3>
                <span>Tanggal Pelaksanaan</span>
                <h3>{{ $event->lokasi }}</h3>
                <span>Lokasi Kegiatan</span>
            </div>
        </div>
    </div>

    <div class="other-section">
        <h2>Event lain</h2>
        <div class="other-grid">
            @foreach($eventLain as $lain)
            <a href="{{ route('event.detail', $lain->id) }}" style="text-decoration: none; color: inherit;">
                <div class="small-card">
                    <div class="date-sq">
                        <h4 style="margin:0">{{ \Carbon\Carbon::parse($lain->tanggal)->format('d') }}</h4>
                        <small>{{ strtoupper(\Carbon\Carbon::parse($lain->tanggal)->format('M')) }}</small>
                    </div>
                    <div>
                        <h5 style="margin:0; font-weight:700;">{{ $lain->nama_event }}</h5>
                        <p style="font-size:0.75rem; color:#888; margin:5px 0;">{{ Str::limit($lain->deskripsi, 50) }}</p>
                        <small style="color:#b91c1c">📍 {{ $lain->lokasi }}</small>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection