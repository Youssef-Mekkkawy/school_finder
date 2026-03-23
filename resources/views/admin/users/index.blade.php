<!-- ══ USERS PAGE ══ -->
<div id="page-users" style="display:none">
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="us-page-title">Registered Users</h3>
            <div class="sec-head-actions">
                <div class="tbl-search">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="text" id="user-search" placeholder="Search users..."
                        oninput="filterUserTable()">
                </div>
            </div>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th id="th-us-name">Name</th>
                        <th id="th-us-email">Email</th>
                        <th id="th-us-joined">Joined</th>
                        <th id="th-us-favs">Favorites</th>
                        <th id="th-us-revs">Reviews</th>
                        <th id="th-us-act">Actions</th>
                    </tr>
                </thead>
                <tbody id="users-body"></tbody>
            </table>
        </div>
        <div class="tbl-foot"><span class="tbl-info" id="us-tbl-info">Showing all users</span></div>
    </div>
</div>
