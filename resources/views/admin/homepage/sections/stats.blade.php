<!-- Stats Bar -->
<div class="sec-card">
    <div class="sec-head">
        <div>
            <h3 id="hp-stats-title">Stats Bar</h3>
            <div style="font-size:.78rem;color:var(--muted);margin-top:.15rem" id="hp-stats-sub">Numbers
                shown in the stats bar below the hero</div>
        </div>
        <button class="btn-sm btn-teal" onclick="saveStats()" id="hp-save-stats">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17,21 17,13 7,13 7,21" />
                <polyline points="7,3 7,8 15,8" />
            </svg>
            <span id="hp-save-stats-txt">Save Stats</span>
        </button>
    </div>
    <div style="padding:1.4rem 1.5rem">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem" id="stats-fields">
            <div class="field"><label>Stat 1 — Value</label><input class="fi" type="text" id="st1-val"
                    value="105+"></div>
            <div class="field"><label>Stat 1 — Label</label><input class="fi" type="text" id="st1-lbl"
                    value="International Schools"></div>
            <div class="field"><label>Stat 2 — Value</label><input class="fi" type="text" id="st2-val"
                    value="7"></div>
            <div class="field"><label>Stat 2 — Label</label><input class="fi" type="text" id="st2-lbl"
                    value="Curriculum Types"></div>
            <div class="field"><label>Stat 3 — Value</label><input class="fi" type="text" id="st3-val"
                    value="500+"></div>
            <div class="field"><label>Stat 3 — Label</label><input class="fi" type="text" id="st3-lbl"
                    value="Parent Reviews"></div>
            <div class="field"><label>Stat 4 — Value</label><input class="fi" type="text" id="st4-val"
                    value="Free"></div>
            <div class="field"><label>Stat 4 — Label</label><input class="fi" type="text" id="st4-lbl"
                    value="Always Free to Use"></div>
        </div>
        <!-- Preview -->
        <div style="margin-top:.8rem;background:#F8FAFF;border:1.5px solid var(--border);border-radius:10px;padding:.9rem 1.5rem;display:flex;justify-content:center;gap:2.5rem;flex-wrap:wrap"
            id="stats-preview">
            <div style="text-align:center">
                <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:var(--navy)"
                    id="pst1-val">105+</div>
                <div style="font-size:.78rem;color:var(--muted)" id="pst1-lbl">International Schools</div>
            </div>
            <div style="text-align:center">
                <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:var(--navy)"
                    id="pst2-val">7</div>
                <div style="font-size:.78rem;color:var(--muted)" id="pst2-lbl">Curriculum Types</div>
            </div>
            <div style="text-align:center">
                <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:var(--navy)"
                    id="pst3-val">500+</div>
                <div style="font-size:.78rem;color:var(--muted)" id="pst3-lbl">Parent Reviews</div>
            </div>
            <div style="text-align:center">
                <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:var(--navy)"
                    id="pst4-val">Free</div>
                <div style="font-size:.78rem;color:var(--muted)" id="pst4-lbl">Always Free to Use</div>
            </div>
        </div>
    </div>
</div>
