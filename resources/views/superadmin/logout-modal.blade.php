<div id="logoutModal" style="display:none;">
    <div class="modal-content">
        <h3>Yakin ingin logout?</h3>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <button onclick="closeModal()">Batal</button>
    </div>
</div>

<script>
function closeModal() {
    document.getElementById('logoutModal').style.display = 'none';
}
</script>