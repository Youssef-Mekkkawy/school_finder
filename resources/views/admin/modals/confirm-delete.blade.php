<!-- ══ CONFIRM DELETE MODAL ══ -->
<div class="ov" id="confirmModal" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="modal" style="max-width:400px">
        <div class="mb" style="text-align:center;padding:2rem 1.5rem">
            <div class="confirm-icon del">🗑️</div>
            <h3 style="font-family:'Sora',sans-serif;font-size:1.05rem;color:var(--navy);margin-bottom:.5rem"
                id="confirm-title">Delete School?</h3>
            <p style="font-size:.87rem;color:var(--muted);margin-bottom:1.5rem" id="confirm-sub">This action cannot
                be undone.</p>
            <div style="display:flex;gap:.7rem;justify-content:center">
                <button class="btn-sm btn-outline" style="padding:.55rem 1.3rem"
                    onclick="document.getElementById('confirmModal').classList.remove('open')"
                    id="conf-cancel">Cancel</button>
                <button class="btn-sm" style="background:var(--err);color:white;padding:.55rem 1.3rem"
                    onclick="confirmDelete()" id="conf-delete">Delete</button>
            </div>
        </div>
    </div>
</div>
