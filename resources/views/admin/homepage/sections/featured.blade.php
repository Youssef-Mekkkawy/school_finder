<!-- Featured Schools -->
<div class="sec-card">
    <div class="sec-head">
        <div>
            <h3 id="hp-feat-title">Featured Schools</h3>
            <div style="font-size:.78rem;color:var(--muted);margin-top:.15rem" id="hp-feat-sub">Choose which
                schools appear as featured on the homepage (max 6)</div>
        </div>
        <button class="btn-sm btn-teal" onclick="saveFeatured()" id="hp-save-feat">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17,21 17,13 7,13 7,21" />
                <polyline points="7,3 7,8 15,8" />
            </svg>
            <span id="hp-save-feat-txt">Save Featured</span>
        </button>
    </div>
    <div style="padding:1.4rem 1.5rem">
        <div style="font-size:.83rem;color:var(--muted);margin-bottom:.9rem" id="hp-feat-hint">Check the
            schools you want to feature on the homepage. Max 6 schools.</div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:.6rem" id="feat-checkboxes"></div>
    </div>
</div>
