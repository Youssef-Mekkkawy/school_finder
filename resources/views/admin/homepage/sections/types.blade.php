<!-- Type Cards -->
<div class="sec-card">
    <div class="sec-head">
        <div>
            <h3 id="hp-types-title">Type Cards</h3>
            <div style="font-size:.78rem;color:var(--muted);margin-top:.15rem" id="hp-types-sub">Edit the
                curriculum type cards shown on the homepage</div>
        </div>
        <button class="btn-sm btn-teal" onclick="saveTypes()" id="hp-save-types">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17,21 17,13 7,13 7,21" />
                <polyline points="7,3 7,8 15,8" />
            </svg>
            <span id="hp-save-types-txt">Save Types</span>
        </button>
    </div>
    <div style="padding:1.4rem 1.5rem">
        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:.8rem" id="types-fields"></div>
        <!-- Preview -->
        <div style="margin-top:1rem">
            <div
                style="font-size:.78rem;font-weight:600;color:var(--muted);margin-bottom:.6rem;text-transform:uppercase;letter-spacing:.04em">
                Preview</div>
            <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:.7rem" id="types-preview">
            </div>
        </div>
    </div>
</div>
