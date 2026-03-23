<!-- ══ APPOINTMENTS PAGE ══ -->
<div id="page-appointments" style="display:none">
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="ap-page-title">Manage Appointments</h3>
            <div class="sec-head-actions">
                <select class="btn-sm btn-outline" id="appt-filter" onchange="filterApptTable()"
                    style="cursor:pointer;border:1.5px solid var(--border)!important;">
                    <option value="all" id="af-all">All</option>
                    <option value="pending" id="af-pend">Pending</option>
                    <option value="confirmed" id="af-conf">Confirmed</option>
                    <option value="cancelled" id="af-canc">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th id="th-ap-user">User</th>
                        <th id="th-ap-school">School</th>
                        <th id="th-ap-date">Date</th>
                        <th id="th-ap-msg">Message</th>
                        <th id="th-ap-status">Status</th>
                        <th id="th-ap-act">Actions</th>
                    </tr>
                </thead>
                <tbody id="appts-body"></tbody>
            </table>
        </div>
        <div class="tbl-foot">
            <span class="tbl-info" id="ap-tbl-info">Showing all appointments</span>
        </div>
    </div>
</div>
