<!-- ══ SCHOOLS PAGE ══ -->
<div id="page-schools" style="display:none">
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="sc-page-title">All Schools</h3>
            <div class="sec-head-actions">
                <div class="tbl-search">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="text" id="school-search" placeholder="Search schools..."
                        oninput="filterSchoolTable()">
                </div>
                <button class="btn-sm btn-teal" onclick="openSchoolModal()" id="add-school-btn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    <span id="add-btn-txt">Add School</span>
                </button>
            </div>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th id="th-sc-name">School Name</th>
                        <th id="th-sc-type">Type</th>
                        <th id="th-sc-loc">Location</th>
                        <th id="th-sc-fee">Fee Range</th>
                        <th id="th-sc-rat">Rating</th>
                        <th id="th-sc-act">Actions</th>
                    </tr>
                </thead>
                <tbody id="schools-body"></tbody>
            </table>
        </div>
        <div class="tbl-foot">
            <span class="tbl-info" id="sc-tbl-info">Showing 5 of 5 schools</span>
            <div class="pg">
                <div class="pgb on">1</div>
            </div>
        </div>
    </div>
</div>
