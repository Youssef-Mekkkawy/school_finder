<!-- ══ DASHBOARD PAGE ══ -->
<div id="page-dashboard">

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card c1">
            <div class="stat-icon si1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="var(--teal)" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9,22 9,12 15,12 15,22" />
                </svg></div>
            <div class="stat-val" id="sc-total">5</div>
            <div class="stat-lbl" id="sc-lbl">Total Schools</div>
            <div class="stat-delta delta-up" id="sc-delta">↑ Demo data</div>
        </div>
        <div class="stat-card c2">
            <div class="stat-icon si2"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#3498db" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                </svg></div>
            <div class="stat-val" id="us-total">12</div>
            <div class="stat-lbl" id="us-lbl">Registered Users</div>
            <div class="stat-delta delta-up" id="us-delta">↑ +3 this week</div>
        </div>
        <div class="stat-card c3">
            <div class="stat-icon si3"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="var(--warn)" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg></div>
            <div class="stat-val" id="rv-total">11</div>
            <div class="stat-lbl" id="rv-lbl">Total Reviews</div>
            <div class="stat-delta" style="color:var(--warn)" id="rv-delta">⚠ 2 pending approval</div>
        </div>
        <div class="stat-card c4">
            <div class="stat-icon si4"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#9b59b6" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg></div>
            <div class="stat-val" id="ap-total">5</div>
            <div class="stat-lbl" id="ap-lbl">Appointments</div>
            <div class="stat-delta" style="color:#9b59b6" id="ap-delta">3 pending review</div>
        </div>
    </div>

    <!-- CHARTS ROW -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.2rem;margin-bottom:1.5rem">

        <!-- Schools by Type -->
        <div class="sec-card">
            <div class="sec-head">
                <h3 id="ch1-title">Schools by Type</h3>
            </div>
            <div style="padding:1.2rem 1.4rem" id="type-chart">
                <div class="chart-row"><span class="chart-label">British</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:60%;background:linear-gradient(90deg,#3730A3,#6366f1)"></div>
                    </div><span class="chart-val">3</span>
                </div>
                <div class="chart-row"><span class="chart-label">American</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:20%;background:linear-gradient(90deg,#9A3412,#f97316)"></div>
                    </div><span class="chart-val">1</span>
                </div>
                <div class="chart-row"><span class="chart-label">German</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:20%;background:linear-gradient(90deg,var(--teal),#1abc9c)"></div>
                    </div><span class="chart-val">1</span>
                </div>
                <div class="chart-row"><span class="chart-label">French</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:20%;background:linear-gradient(90deg,#9F1239,#f43f5e)"></div>
                    </div><span class="chart-val">1</span>
                </div>
            </div>
        </div>

        <!-- Top Rated -->
        <div class="sec-card">
            <div class="sec-head">
                <h3 id="ch2-title">Top Rated Schools</h3>
            </div>
            <div style="padding:1.2rem 1.4rem" id="rating-chart">
                <div class="chart-row"><span class="chart-label" style="font-size:.75rem;width:130px">Cairo
                        American</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:96%;background:linear-gradient(90deg,#f59e0b,#fbbf24)"></div>
                    </div><span class="chart-val">4.8</span>
                </div>
                <div class="chart-row"><span class="chart-label" style="font-size:.75rem;width:130px">BISC
                        Cairo</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:94%;background:linear-gradient(90deg,#f59e0b,#fbbf24)"></div>
                    </div><span class="chart-val">4.7</span>
                </div>
                <div class="chart-row"><span class="chart-label" style="font-size:.75rem;width:130px">Rahn
                        Schulen</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:92%;background:linear-gradient(90deg,#f59e0b,#fbbf24)"></div>
                    </div><span class="chart-val">4.6</span>
                </div>
                <div class="chart-row"><span class="chart-label" style="font-size:.75rem;width:130px">El
                        Alsson</span>
                    <div class="chart-bar-wrap">
                        <div class="chart-bar"
                            style="width:90%;background:linear-gradient(90deg,#f59e0b,#fbbf24)"></div>
                    </div><span class="chart-val">4.5</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="sec-card">
        <div class="sec-head">
            <h3 id="ra-title">Recent Activity</h3>
            <button class="btn-sm btn-outline"
                onclick="showPage('appointments',document.getElementById('si-appts'))" id="ra-view">View
                All</button>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th id="th-user">User</th>
                        <th id="th-action">Action</th>
                        <th id="th-school">School</th>
                        <th id="th-time">Time</th>
                        <th id="th-status">Status</th>
                    </tr>
                </thead>
                <tbody id="activity-body"></tbody>
            </table>
        </div>
    </div>
</div>
