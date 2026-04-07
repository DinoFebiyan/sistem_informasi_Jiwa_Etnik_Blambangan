<style>
  /* ══ OVERLAY MODAL ══ */
  .modal-overlay {
    position: fixed; 
    top: 0; left: 0; right: 0; bottom: 0; 
    background-color: rgba(0, 0, 0, 0.4); /* Efek gelap transparan di belakang popup */
    display: none; /* Disembunyikan secara default, akan diubah ke 'flex' via JS */
    align-items: center; 
    justify-content: center; 
    z-index: 9999;
  }
  
  /* ══ KOTAK MODAL UTAMA ══ */
  .modal-box {
    background: #ffffff; 
    width: 100%; 
    max-width: 550px;
    border-radius: 12px; 
    padding: 2.5rem; 
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    font-family: 'Poppins', sans-serif;
    animation: modalSlideDown 0.3s ease-out forwards;
  }
  
  @keyframes modalSlideDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .modal-box h2 { 
    font-size: 1.25rem; 
    font-weight: 700; 
    color: #333; 
    margin-bottom: 1.5rem; 
  }
  
  /* ══ GRID FORM (2 KOLOM) ══ */
  .form-grid { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 1.5rem; 
  }
  
  @media (max-width: 500px) { 
    .form-grid { grid-template-columns: 1fr; /* Jadi 1 kolom kalau di layar HP */ } 
  }
  
  .form-group { 
    display: flex; 
    flex-direction: column; 
    gap: 0.5rem; 
  }
  
  .form-group label { 
    font-size: 0.85rem; 
    font-weight: 600; 
    color: #333; 
  }
  
  .form-group input { 
    padding: 0.75rem 1rem; 
    border: 1px solid #ddd; 
    border-radius: 8px; 
    font-family: 'Poppins', sans-serif; 
    font-size: 0.85rem; 
    color: #333;
    outline: none; 
    transition: border-color 0.2s;
  }
  
  .form-group input:focus { 
    border-color: #6b0808; /* Warna merah maroon JEB saat diklik */
  }

  .form-group input::placeholder {
    color: #aaa;
  }
  
  /* ══ TOMBOL AKSI ══ */
  .modal-footer { 
    margin-top: 2.5rem; 
    display: flex; 
    justify-content: center; 
    gap: 1rem; 
  }
  
  .btn-modal { 
    padding: 0.6rem 2rem; 
    border-radius: 8px; 
    font-weight: 600; 
    font-size: 0.9rem; 
    font-family: 'Poppins', sans-serif;
    cursor: pointer; 
    transition: all 0.2s; 
  }
  
  .btn-batal { 
    background: transparent; 
    border: 1px solid #ccc; 
    color: #333; 
  }
  
  .btn-batal:hover { 
    background: #f5f5f5; 
  }
  
  .btn-simpan { 
    background: #6b0808; /* Merah Maroon JEB */
    border: 1px solid #6b0808; 
    color: #ffffff; 
  }
  
  .btn-simpan:hover { 
    background: #4a0505; 
    border-color: #4a0505; 
  }
</style>

<div class="modal-overlay" id="modalTambahAdmin">
  <div class="modal-box">
    <h2>Tambah Admin Baru</h2>
    
    <form action="javascript:void(0)" onsubmit="simulasiSimpan()">
      @csrf
      
      <div class="form-grid">
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="name" placeholder="Contoh: Budi Santoso" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Contoh: budi@jeb.id" required>
        </div>
        
        <div class="form-group">
          <label for="password_confirmation">Konfirmasi Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn-modal btn-batal" onclick="closeModalTambahAdmin()">Batal</button>
        <button type="submit" class="btn-modal btn-simpan">Simpan Admin</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModalTambahAdmin() {
    document.getElementById('modalTambahAdmin').style.display = 'flex';
  }

  function closeModalTambahAdmin() {
    document.getElementById('modalTambahAdmin').style.display = 'none';
  }

  function simulasiSimpan() {
    alert('Simulasi Frontend: Data Admin berhasil disimpan!');
    closeModalTambahAdmin(); 
  }
</script>