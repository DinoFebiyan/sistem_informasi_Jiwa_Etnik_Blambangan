<div id="modalTambahEvent" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 1000; justify-content: center; align-items: center; font-family: sans-serif;">
    
    <div style="background: #fff; width: 100%; max-width: 550px; border-radius: 12px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.2); max-height: 90vh; overflow-y: auto; margin: 20px; box-sizing: border-box;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <h2 style="margin: 0; font-size: 1.5rem; color: #333; font-family: 'Playfair Display', serif;">Tambah Event Baru</h2>
            <button type="button" onclick="tutupModalEvent()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #888; padding: 0;">&times;</button>
        </div>

        <form action="#" method="POST">
            @csrf 

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Nama Event</label>
                <input type="text" name="nama_event" placeholder="Misal: Pentas Tari Gandrung" required
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none;">
            </div>

            <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                <div style="flex: 1;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Tanggal</label>
                    <input type="date" name="tanggal" required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none;">
                </div>
                <div style="flex: 1;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Jam</label>
                    <input type="time" name="jam" required
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Lokasi</label>
                <input type="text" name="lokasi" placeholder="Misal: Pendopo Sabha Swagata" required
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Deskripsi</label>
                <textarea name="deskripsi" rows="3" placeholder="Tuliskan detail singkat mengenai event..." required
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none; resize: vertical;"></textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: #444;">Tipe Event</label>
                <select name="tipe" required
                    style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.9rem; box-sizing: border-box; outline: none; background: white; cursor: pointer;">
                    <option value="" disabled selected>Pilih Tipe Event</option>
                    <option value="Internal">Internal Sanggar</option>
                    <option value="Publik">Terbuka untuk Publik</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #eee; padding-top: 20px;">
                <button type="button" onclick="tutupModalEvent()"
                    style="padding: 10px 20px; border: 1px solid #ccc; background: #fff; color: #555; border-radius: 8px; font-weight: bold; cursor: pointer;">
                    Batal
                </button>
                <button type="submit"
                    style="padding: 10px 20px; border: none; background: var(--merah, #8b5a5a); color: #fff; border-radius: 8px; font-weight: bold; cursor: pointer;">
                    Simpan Event
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Membuka Modal (Mengubah display menjadi flex agar ke tengah)
    function bukaModalEvent() {
        document.getElementById('modalTambahEvent').style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Mencegah background di-scroll
    }

    // Menutup Modal
    function tutupModalEvent() {
        document.getElementById('modalTambahEvent').style.display = 'none';
        document.body.style.overflow = 'auto'; // Mengembalikan scroll
    }

    // Menutup modal jika klik area luar kotak putih
    window.onclick = function(event) {
        const modal = document.getElementById('modalTambahEvent');
        if (event.target == modal) {
            tutupModalEvent();
        }
    }
</script>