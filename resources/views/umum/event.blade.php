@extends('layouts.umum')

@section('title', 'Kalender Event - Sanggar JEB')

@push('styles')
<style>
    /* Style khusus halaman ini untuk tata letak kalender & list */
    .full-calendar-section { padding: 5rem 8%; background: #fff; }
    .nav-header { display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 2rem; }
    
    /* Grid Utama: Kiri Kalender, Kanan List */
    .main-grid { display: grid; grid-template-columns: 350px 1fr; gap: 3rem; }
    
    /* Widget Kalender */
    .cal-box { border: 1px solid #eee; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
    .cal-top { background: #7a1212; color: white; padding: 1.2rem; display: flex; justify-content: space-between; align-items: center; }
    .cal-btn { background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; }
    
    .cal-content { padding: 1.5rem; }
    .cal-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; text-align: center; }
    .day-label { font-size: 0.75rem; color: #aaa; font-weight: 600; }
    .date-num { padding: 10px 0; font-size: 0.9rem; border-radius: 8px; }
    .date-num.has-event { background: #f8d7da; font-weight: 700; color: #7a1212; }
    .date-num.active { background: #7a1212; color: white; font-weight: 700; }

    /* List Event */
    .event-card { border: 1px solid #eee; border-radius: 12px; padding: 1.2rem; display: flex; gap: 1.5rem; margin-bottom: 1rem; }
    .event-date-box { background: #7a1212; color: white; padding: 0.8rem; border-radius: 10px; min-width: 70px; text-align: center; }
</style>
@endpush

@section('content')
<section class="full-calendar-section" x-data="calendarApp()">
    <div class="section-header">
        <span class="badge-pill">Daftar Kegiatan</span>
        <h2 class="section-title">Kalender Event Lengkap</h2>
    </div>

    <div class="main-grid">
        <div class="cal-box">
            <div class="cal-top">
                <button class="cal-btn" @click="prevMonth()">❮</button>
                <h3 x-text="monthNames[month] + ' ' + year"></h3>
                <button class="cal-btn" @click="nextMonth()">❯</button>
            </div>
            <div class="cal-content">
                <div class="cal-grid">
                    <template x-for="day in ['Su','Mo','Tu','We','Th','Fr','Sa']">
                        <span class="day-label" x-text="day"></span>
                    </template>
                    
                    <template x-for="blank in blankDays"><div></div></template>
                    
                    <template x-for="date in daysInMonth">
                        <div class="date-num" 
                             :class="{'active': isToday(date), 'has-event': hasEvent(date)}" 
                             x-text="date"></div>
                    </template>
                </div>
            </div>
        </div>

        <div class="event-list">
            <template x-for="event in filteredEvents" :key="event.id">
                <div class="event-card">
                    <div class="event-date-box">
                        <h2 x-text="event.day" style="margin:0"></h2>
                        <span x-text="monthNames[month].substring(0,3).toUpperCase()"></span>
                    </div>
                    <div>
                        <h4 x-text="event.title" style="color:#7a1212; margin-bottom:5px"></h4>
                        <p x-text="event.desc" style="font-size:0.85rem; color:#666"></p>
                        <div style="font-size:0.8rem; margin-top:10px">
                            <span x-text="'📍 ' + event.loc"></span> &nbsp; 
                            <span x-text="'🕐 ' + event.time"></span>
                        </div>
                    </div>
                </div>
            </template>

            <div x-show="filteredEvents.length === 0" style="padding: 3rem; text-align:center; color:#999">
                Tidak ada event terjadwal di bulan ini.
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
function calendarApp() {
    return {
        month: 2, 
        year: 2026,
        monthNames: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        allEvents: [
            { id: 1, day: 21, month: 2, year: 2026, title: 'Pentas Tari Gandrung', desc: 'HUT Jadi Kabupaten Banyuwangi ke-254', loc: 'Pendopo', time: '19:00 WIB' },
            { id: 2, day: 24, month: 2, year: 2026, title: 'Workshop Seni Tari', desc: 'Pelatihan dasar pemula.', loc: 'Sanggar JEB', time: '15:00 WIB' },
            { id: 3, day: 15, month: 3, year: 2026, title: 'Latihan Alam', desc: 'Latihan di tepi pantai.', loc: 'Pantai Boom', time: '16:00 WIB' }
        ],
        blankDays: [], daysInMonth: [],
        init() { this.calc(); },
        calc() {
            let first = new Date(this.year, this.month, 1).getDay();
            let days = new Date(this.year, this.month + 1, 0).getDate();
            this.blankDays = Array.from({length: first}, (_, i) => i);
            this.daysInMonth = Array.from({length: days}, (_, i) => i + 1);
        },
        // Fungsi untuk menggeser bulan (Siku Kanan)
        nextMonth() { 
            if(this.month == 11) { this.month = 0; this.year++; } 
            else { this.month++; } 
            this.calc(); 
        },
        // Fungsi untuk menggeser bulan (Siku Kiri)
        prevMonth() { 
            if(this.month == 0) { this.month = 11; this.year--; } 
            else { this.month--; } 
            this.calc(); 
        },
        get filteredEvents() { 
            return this.allEvents.filter(e => e.month === this.month && e.year === this.year); 
        },
        hasEvent(d) { 
            return this.allEvents.some(e => e.day === d && e.month === this.month && e.year === this.year); 
        },
        isToday(d) {
            let t = new Date();
            return t.getDate()==d && t.getMonth()==this.month && t.getFullYear()==this.year;
        }
    }
}
</script>
@endsection