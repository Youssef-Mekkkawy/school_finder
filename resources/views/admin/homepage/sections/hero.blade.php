<!-- Hero Section -->
<div class="sec-card">
    <div class="sec-head">
        <div>
            <h3 id="hp-hero-title">Hero Section</h3>
            <div style="font-size:.78rem;color:var(--muted);margin-top:.15rem" id="hp-hero-sub">Edit the
                main banner text visitors see first</div>
        </div>
        <button class="btn-sm btn-teal" onclick="saveHero()" id="hp-save-hero">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17,21 17,13 7,13 7,21" />
                <polyline points="7,3 7,8 15,8" />
            </svg>
            <span id="hp-save-hero-txt">Save Hero</span>
        </button>
    </div>
    <div style="padding:1.4rem 1.5rem">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
            <div class="field">
                <label id="hp-badge-lbl">Badge Text</label>
                <input class="fi" type="text" id="hp-badge" value="105+ International Schools in Cairo">
            </div>
            <div class="field">
                <label id="hp-title-lbl">Hero Title</label>
                <input class="fi" type="text" id="hp-title"
                    value="Find the Perfect International School for Your Child">
            </div>
            <div class="field" style="grid-column:1/-1">
                <label id="hp-subtitle-lbl">Hero Subtitle</label>
                <textarea class="fi" id="hp-subtitle" rows="2"
                    style="resize:none">Search, compare, and evaluate international schools in Cairo — all in one place. Save hours of research with powerful filters and real parent reviews.</textarea>
            </div>
            <div class="field">
                <label id="hp-btn-lbl">Search Button Text</label>
                <input class="fi" type="text" id="hp-btn" value="Search Schools →">
            </div>
            <div class="field">
                <label id="hp-cta-lbl">CTA Primary Button</label>
                <input class="fi" type="text" id="hp-cta" value="Browse All Schools">
            </div>
        </div>
        <!-- Live Preview -->
        <div
            style="margin-top:1rem;background:linear-gradient(160deg,var(--navy),#1a5276);border-radius:12px;padding:1.5rem 2rem;text-align:center;position:relative;overflow:hidden">
            <div style="background:rgba(20,143,119,.2);border:1px solid rgba(20,143,119,.4);border-radius:20px;display:inline-flex;align-items:center;gap:.4rem;padding:.28rem .8rem;font-size:.75rem;color:#52d9bd;margin-bottom:.8rem"
                id="prev-badge">105+ International Schools in Cairo</div>
            <div style="font-family:'Sora',sans-serif;font-weight:800;font-size:1.2rem;color:white;margin-bottom:.4rem"
                id="prev-title">Find the Perfect International School for Your Child</div>
            <div style="font-size:.8rem;color:#a8c4d8;margin-bottom:.8rem" id="prev-subtitle">Search,
                compare, and evaluate international schools in Cairo — all in one place.</div>
            <div style="display:inline-block;background:var(--teal);color:white;border-radius:8px;padding:.4rem 1.2rem;font-size:.8rem;font-weight:600"
                id="prev-btn">Search Schools →</div>
        </div>
    </div>
</div>
