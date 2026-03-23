<!-- ══ NOTIFICATIONS PAGE ══ -->
<div id="page-notifications" style="display:none">
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="nt-page-title">Send Notification</h3>
        </div>
        <div style="padding:1.4rem 1.5rem;max-width:600px">
            <div class="field">
                <label id="nt-target-lbl">Send To</label>
                <select class="fi" id="nt-target">
                    <option value="all" id="nt-all">All Users</option>
                    <option value="user" id="nt-user">Specific User</option>
                </select>
            </div>
            <div class="field" id="nt-user-field" style="display:none">
                <label id="nt-user-lbl">Select User</label>
                <select class="fi" id="nt-user-sel">
                    <option>Omar Ahmed — omar@test.com</option>
                    <option>Sara Mohamed — sara@test.com</option>
                    <option>Layla Hassan — layla@test.com</option>
                </select>
            </div>
            <div class="field">
                <label id="nt-title-lbl">Notification Title</label>
                <input class="fi" type="text" id="nt-title"
                    placeholder="e.g. Fee Update — BISC Cairo 2026/2027" oninput="updatePreview()">
            </div>
            <div class="field">
                <label id="nt-msg-lbl">Message</label>
                <textarea class="fi" id="nt-msg" rows="4"
                    placeholder="Write your notification message here..." oninput="updatePreview()"
                    style="resize:none"></textarea>
            </div>
            <div class="field">
                <label id="nt-prev-lbl">Preview</label>
                <div class="notif-preview" id="nt-preview">
                    <div style="font-weight:600;font-size:.88rem;color:var(--navy);margin-bottom:.3rem"
                        id="prev-title">Notification Title</div>
                    <div style="font-size:.84rem;color:var(--muted)" id="prev-msg">Your message will appear
                        here...</div>
                </div>
            </div>
            <button class="btn-sm btn-teal" style="padding:.55rem 1.4rem;font-size:.88rem"
                onclick="sendNotification()" id="send-notif-btn">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <line x1="22" y1="2" x2="11" y2="13" />
                    <polygon points="22,2 15,22 11,13 2,9" />
                </svg>
                <span id="send-btn-txt">Send Notification</span>
            </button>
        </div>
        <!-- Notification History -->
        <div style="border-top:1px solid var(--border)">
            <div class="sec-head">
                <h3 id="nh-title">Notification History</h3>
            </div>
            <div class="tbl-wrap">
                <table>
                    <thead>
                        <tr>
                            <th id="th-nt-title">Title</th>
                            <th id="th-nt-target">Target</th>
                            <th id="th-nt-sent">Sent At</th>
                            <th id="th-nt-read">Read Rate</th>
                        </tr>
                    </thead>
                    <tbody id="notif-history"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
