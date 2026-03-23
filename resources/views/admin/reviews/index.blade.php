<!-- ══ REVIEWS PAGE ══ -->
<div id="page-reviews" style="display:none">
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="rv-page-title">Manage Reviews</h3>
            <div class="sec-head-actions">
                <select class="btn-sm btn-outline" id="rev-filter" onchange="filterRevTable()"
                    style="cursor:pointer;border:1.5px solid var(--border)!important;">
                    <option value="all" id="rf-all">All</option>
                    <option value="pending" id="rf-pend">Pending</option>
                    <option value="approved" id="rf-app">Approved</option>
                </select>
            </div>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th id="th-rv-user">User</th>
                        <th id="th-rv-school">School</th>
                        <th id="th-rv-rating">Rating</th>
                        <th id="th-rv-comment">Comment</th>
                        <th id="th-rv-status">Status</th>
                        <th id="th-rv-act">Actions</th>
                    </tr>
                </thead>
                <tbody id="reviews-body"></tbody>
            </table>
        </div>
        <div class="tbl-foot">
            <span class="tbl-info" id="rv-tbl-info">Showing all reviews</span>
        </div>
    </div>
</div>
