<!-- SCHOOLS GRID -->
<section class="schools-sec" id="schools">
    <div class="si">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:.35rem">
            <div>
                <span class="sec-tag" id="tag-sc">Featured Schools</span>
                <h2 class="sec-title" id="ttl-sc">International Schools in Cairo</h2>
                <p class="sec-sub" id="sub-sc">Verified information and real parent reviews.</p>
            </div>
            <a href="{{ route('schools.index') }}"
                style="color:var(--teal);font-weight:600;font-size:.86rem;text-decoration:none;white-space:nowrap"
                id="va-link">View all →</a>
        </div>
        <div class="sh">
            <div class="rcnt"><strong id="rcount">5</strong> <span id="r-lbl">schools found</span></div>
            <div class="sort-row">
                <span id="sort-lbl">Sort by:</span>
                <select class="sort-s" id="sortSel" onchange="doFilter()">
                    <option value="default" id="so-d">Default</option>
                    <option value="name" id="so-n">Name A–Z</option>
                    <option value="fee-lo" id="so-fl">Fee: Low → High</option>
                    <option value="fee-hi" id="so-fh">Fee: High → Low</option>
                    <option value="rating" id="so-r">Highest Rated</option>
                </select>
            </div>
        </div>
        <div class="sgrid" id="grid"></div>
        <div class="nores" id="nores" style="display:none">
            <h3 id="no-t">No schools found</h3>
            <p id="no-s">Try adjusting your filters.</p>
            <button onclick="resetAll()"
                style="margin-top:.9rem;background:var(--teal);color:white;border:none;border-radius:9px;padding:.55rem 1.3rem;font-family:'Sora',sans-serif;font-weight:600;cursor:pointer"
                id="rst-btn">Clear Filters</button>
        </div>
        <div class="pg" id="pgbar"></div>
    </div>
</section>
