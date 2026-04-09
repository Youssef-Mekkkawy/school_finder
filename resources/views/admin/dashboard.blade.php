@extends('layouts.admin')

@section('title', 'Admin Dashboard — SchoolFinder Egypt')

@section('content')
<!-- ── SIDEBAR ── -->
    <div class="sidebar" id="sidebar">
        <div class="sb-logo">
            <div class="logo-icon">SF</div>
            <div>
                <div class="logo-txt">School<span>Finder</span></div>
            </div>
            <span class="sb-badge">Admin</span>
        </div>

        <nav class="sb-nav">
            <div class="sb-section" id="sbs-main">Main</div>
            <div class="sb-item act" onclick="showPage('dashboard',this)" id="si-dashboard">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                </svg>
                <span id="sl-dash">Dashboard</span>
            </div>

            <div class="sb-section" id="sbs-manage">Manage</div>
            <div class="sb-item" onclick="showPage('schools',this)" id="si-schools">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9,22 9,12 15,12 15,22" />
                </svg>
                <span id="sl-schools">Schools</span>
            </div>
            <div class="sb-item" onclick="showPage('homepage',this)" id="si-homepage">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <path d="M3 9h18M9 21V9" />
                </svg>
                <span id="sl-homepage">Homepage</span>
            </div>
            <div class="sb-item" onclick="showPage('reviews',this)" id="si-reviews">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
                <span id="sl-reviews">Reviews</span>
                <span class="sb-badge-count" id="rev-badge">2</span>
            </div>
            <div class="sb-item" onclick="showPage('appointments',this)" id="si-appts">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                <span id="sl-appts">Appointments</span>
                <span class="sb-badge-count" id="appt-badge">3</span>
            </div>
            <div class="sb-item" onclick="showPage('users',this)" id="si-users">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
                <span id="sl-users">Users</span>
            </div>
            <div class="sb-item" onclick="showPage('notifications',this)" id="si-notifs">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
                <span id="sl-notifs">Notifications</span>
            </div>

            <div class="sb-section" id="sbs-sys">System</div>
            <div class="sb-item" onclick="window.location.href='{{ route('home') }}'" id="si-site">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="2" y1="12" x2="22" y2="12" />
                    <path
                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                </svg>
                <span id="sl-site">View Website</span>
            </div>
            <div class="sb-item" onclick="doLogout()" id="si-logout">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16,17 21,12 16,7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                <span id="sl-logout">Logout</span>
            </div>
        </nav>

        <div class="sb-footer">
            <div class="sb-user">
                <div class="sb-avatar">A</div>
                <div>
                    <div class="sb-uname" id="admin-name">Admin User</div>
                    <div class="sb-urole">Administrator</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── MAIN ── -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="topbar-btn" style="display:none" id="menu-btn"
                    onclick="document.getElementById('sidebar').classList.toggle('open')">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <div>
                    <div class="page-title" id="page-title">Dashboard</div>
                    <div class="breadcrumb" id="breadcrumb">Admin / Dashboard</div>
                </div>
            </div>
            <div class="topbar-right">
                <form method="POST" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="lang-btn">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                        </svg>
                        {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                    </button>
                </form>
                <div class="topbar-btn" onclick="showPage('notifications',document.getElementById('si-notifs'))">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                    <div class="notif-dot"></div>
                </div>
                <a href="/login" style="text-decoration:none">
                    <div class="sb-avatar" style="width:32px;height:32px;font-size:.8rem;cursor:pointer">A</div>
                </a>
            </div>
        </div>

        <!-- CONTENT AREA -->
        <div class="content" id="content">

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
                                <option value="attention" id="af-att">Attention</option>
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
                                <option>Omar Ahmed — <template class="__cf_email__" data-cfemail="98f7f5f9ead8ecfdebecb6fbf7f5">[email&#160;protected]</template></option>
                                <option>Sara Mohamed — <template class="__cf_email__" data-cfemail="710210031031051402055f121e1c">[email&#160;protected]</template></option>
                                <option>Layla Hassan — <template class="__cf_email__" data-cfemail="c7aba6beaba687b3a2b4b3e9a4a8aa">[email&#160;protected]</template></option>
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

        </div><!-- end content -->

        <!-- ══ HOMEPAGE MANAGEMENT PAGE ══ -->
        <div id="page-homepage" style="display:none" class="content" style="padding:0">

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

            <!-- Type Cards -->
            <div class="sec-card">
                <div class="sec-head">
                    <div>
                        <h3 id="hp-types-title">Type Cards</h3>
                        <div style="font-size:.78rem;color:var(--muted);margin-top:.15rem" id="hp-types-sub">Edit the
                            curriculum type cards shown on the homepage</div>
                    </div>
                    <button class="btn-sm btn-teal" onclick="saveTypes()" id="hp-save-types">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                            <polyline points="17,21 17,13 7,13 7,21" />
                            <polyline points="7,3 7,8 15,8" />
                        </svg>
                        <span id="hp-save-types-txt">Save Types</span>
                    </button>
                </div>
                <div style="padding:1.4rem 1.5rem">
                    <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:.8rem" id="types-fields"></div>
                    <!-- Preview -->
                    <div style="margin-top:1rem">
                        <div
                            style="font-size:.78rem;font-weight:600;color:var(--muted);margin-bottom:.6rem;text-transform:uppercase;letter-spacing:.04em">
                            Preview</div>
                        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:.7rem" id="types-preview">
                        </div>
                    </div>
                </div>
            </div>

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

        </div><!-- end page-homepage -->
    </div><!-- end main -->

    <!-- ══ SCHOOL MODAL ══ -->
    <div class="ov" id="schoolModal" onclick="if(event.target===this)this.classList.remove('open')">
        <div class="modal wide">
            <div class="mh">
                <h3 id="school-modal-title">Add School</h3>
                <button class="mclose"
                    onclick="document.getElementById('schoolModal').classList.remove('open')">✕</button>
            </div>
            <div class="mb">
                <input type="hidden" id="edit-school-id">
                <div class="fi-2">
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-name">School Name</label>
                        <input class="fi" type="text" id="fm-name-input" placeholder="Full school name">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-type">School Type</label>
                        <select class="fi" id="fm-type-input">
                            <option>British</option>
                            <option>American</option>
                            <option>German</option>
                            <option>French</option>
                            <option>Multinational</option>
                        </select>
                    </div>
                </div>
                <div class="fi-2">
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-area">Area</label>
                        <input class="fi" type="text" id="fm-area-input" placeholder="e.g. New Cairo">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-loc">Location</label>
                        <select class="fi" id="fm-loc-input">
                            <option>New Cairo</option>
                            <option>Maadi</option>
                            <option>Sheikh Zayed</option>
                            <option>6th of October</option>
                            <option>El-Shorouk</option>
                            <option>Heliopolis</option>
                        </select>
                    </div>
                </div>
                <div class="fi-3">
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-fee-min">Fee Min (EGP K)</label>
                        <input class="fi" type="number" id="fm-fee-min-input" placeholder="e.g. 150">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-fee-max">Fee Max (EGP K)</label>
                        <input class="fi" type="number" id="fm-fee-max-input" placeholder="e.g. 350">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-cur">Currency</label>
                        <select class="fi" id="fm-cur-input">
                            <option>EGP</option>
                            <option>USD</option>
                        </select>
                    </div>
                </div>
                <div class="fi-2">
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-age">Age Range</label>
                        <input class="fi" type="text" id="fm-age-input" placeholder="e.g. 3 – 18">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-class">Class Size</label>
                        <input class="fi" type="number" id="fm-class-input" placeholder="e.g. 20">
                    </div>
                </div>
                <div class="fi-2">
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-email">Email</label>
                        <input class="fi" type="email" id="fm-email-input" placeholder="school@email.com">
                    </div>
                    <div class="field" style="margin-bottom:.8rem">
                        <label id="fm-phone">Phone</label>
                        <input class="fi" type="text" id="fm-phone-input" placeholder="+20 X XXXX XXXX">
                    </div>
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-website">Website</label>
                    <input class="fi" type="url" id="fm-website-input" placeholder="https://school.com">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-curricula">Curricula (comma separated)</label>
                    <input class="fi" type="text" id="fm-curricula-input" placeholder="IGCSE, IB Diploma">
                </div>
                <div class="modal-actions">
                    <button class="btn-sm btn-outline"
                        onclick="document.getElementById('schoolModal').classList.remove('open')"
                        id="fm-cancel">Cancel</button>
                    <button class="btn-sm btn-teal" onclick="saveSchool()" id="fm-save">Save School</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ══ CONFIRM DELETE MODAL ══ -->
    <div class="ov" id="confirmModal" onclick="if(event.target===this)this.classList.remove('open')">
        <div class="modal" style="max-width:400px">
            <div class="mb" style="text-align:center;padding:2rem 1.5rem">
                <div class="confirm-icon del">🗑️</div>
                <h3 style="font-family:'Sora',sans-serif;font-size:1.05rem;color:var(--navy);margin-bottom:.5rem"
                    id="confirm-title">Delete School?</h3>
                <p style="font-size:.87rem;color:var(--muted);margin-bottom:1.5rem" id="confirm-sub">This action cannot
                    be undone.</p>
                <div style="display:flex;gap:.7rem;justify-content:center">
                    <button class="btn-sm btn-outline" style="padding:.55rem 1.3rem"
                        onclick="document.getElementById('confirmModal').classList.remove('open')"
                        id="conf-cancel">Cancel</button>
                    <button class="btn-sm" style="background:var(--err);color:white;padding:.55rem 1.3rem"
                        onclick="confirmDelete()" id="conf-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="toast" id="toast"></div>
@endsection

@push('scripts')
<script>
        /* ── Auth Guard (admin) ── */
        (function () {
            const token = localStorage.getItem('sf_token');
            if (!token) { window.location.href = '/login'; return; }
        })();

        /* ═══════════════════════════════════════
           DUMMY DATA
           ═══════════════════════════════════════ */
        let SCHOOLS = [], REVIEWS = [], APPOINTMENTS = [], USERS = [], NOTIF_HISTORY = [], ACTIVITY = [];
        const API_BASE = '/api';
        const getToken = () => localStorage.getItem('sf_token');
        const authHeaders = () => ({ 'Content-Type': 'application/json', 'Authorization': `Bearer ${getToken()}`, 'Accept': 'application/json' });
        const TYPE_MAP = { British: 1, American: 2, German: 3, French: 4, Egyptian: 5, International: 6 };
        const CURRICULUM_MAP = { 'IGCSE': 1, 'IB': 2, 'IB Diploma': 2, 'American Diploma': 3, 'Abitur': 4, 'French Bac': 5, 'French Baccalaureate': 5 };

        /* ═══════════════════════════════════════
           TRANSLATIONS
           ═══════════════════════════════════════ */
        const TR = {
            en: {
                "sl-dash": "Dashboard", "sl-schools": "Schools", "sl-reviews": "Reviews", "sl-appts": "Appointments",
                "sl-users": "Users", "sl-notifs": "Notifications", "sl-site": "View Website", "sl-logout": "Logout",
                "sbs-main": "Main", "sbs-manage": "Manage", "sbs-sys": "System",
                "sc-lbl": "Total Schools", "us-lbl": "Registered Users", "rv-lbl": "Total Reviews", "ap-lbl": "Appointments",
                "sc-delta": "↑ Demo data", "us-delta": "↑ +3 this week", "rv-delta": "⚠ 2 pending approval", "ap-delta": "3 pending review",
                "ch1-title": "Schools by Type", "ch2-title": "Top Rated Schools", "ra-title": "Recent Activity", "ra-view": "View All",
                "th-user": "User", "th-action": "Action", "th-school": "School", "th-time": "Time", "th-status": "Status",
                "sc-page-title": "All Schools", "add-btn-txt": "Add School",
                "th-sc-name": "School Name", "th-sc-type": "Type", "th-sc-loc": "Location", "th-sc-fee": "Fees", "th-sc-rat": "Rating", "th-sc-act": "Actions",
                "rv-page-title": "Manage Reviews", "rf-all": "All", "rf-pend": "Pending", "rf-app": "Approved",
                "th-rv-user": "User", "th-rv-school": "School", "th-rv-rating": "Rating", "th-rv-comment": "Comment", "th-rv-status": "Status", "th-rv-act": "Actions",
                "ap-page-title": "Manage Appointments", "af-all": "All", "af-pend": "Pending", "af-conf": "Confirmed", "af-canc": "Cancelled",
                "th-ap-user": "User", "th-ap-school": "School", "th-ap-date": "Date", "th-ap-msg": "Message", "th-ap-status": "Status", "th-ap-act": "Actions",
                "us-page-title": "Registered Users",
                "th-us-name": "Name", "th-us-email": "Email", "th-us-joined": "Joined", "th-us-favs": "Favorites", "th-us-revs": "Reviews", "th-us-act": "Actions",
                "nt-page-title": "Send Notification", "nt-target-lbl": "Send To", "nt-all": "All Users", "nt-user": "Specific User",
                "nt-user-lbl": "Select User", "nt-title-lbl": "Title", "nt-msg-lbl": "Message", "nt-prev-lbl": "Preview",
                "send-btn-txt": "Send Notification", "nh-title": "Notification History",
                "th-nt-title": "Title", "th-nt-target": "Target", "th-nt-sent": "Sent At", "th-nt-read": "Read Rate",
                "school-modal-title": "Add School", "fm-name": "School Name", "fm-type": "Type", "fm-area": "Area",
                "fm-loc": "Location", "fm-fee-min": "Fee Min (EGP K)", "fm-fee-max": "Fee Max (EGP K)", "fm-cur": "Currency",
                "fm-age": "Age Range", "fm-class": "Class Size", "fm-email": "Email", "fm-phone": "Phone",
                "fm-website": "Website", "fm-curricula": "Curricula", "fm-cancel": "Cancel", "fm-save": "Save School",
                "conf-cancel": "Cancel", "conf-delete": "Delete",
                ok_school_add: "School added successfully!", ok_school_edit: "School updated!", ok_school_del: "School deleted.",
                ok_rev_approve: "Review approved!", ok_rev_del: "Review deleted.",
                ok_appt_confirm: "Appointment confirmed!", ok_appt_cancel: "Appointment cancelled.",
                ok_notif: "Notification sent to all users!",
                ok_user_del: "User removed.",
                notif_empty: "Please fill in title and message.",
                "sl-homepage": "Homepage",
                "hp-hero-title": "Hero Section", "hp-hero-sub": "Edit the main banner text visitors see first",
                "hp-save-hero-txt": "Save Hero", "hp-badge-lbl": "Badge Text", "hp-title-lbl": "Hero Title",
                "hp-subtitle-lbl": "Hero Subtitle", "hp-btn-lbl": "Search Button Text", "hp-cta-lbl": "CTA Primary Button",
                "hp-stats-title": "Stats Bar", "hp-stats-sub": "Numbers shown in the stats bar below the hero", "hp-save-stats-txt": "Save Stats",
                "hp-types-title": "Type Cards", "hp-types-sub": "Edit the curriculum type cards shown on the homepage", "hp-save-types-txt": "Save Types",
                "hp-feat-title": "Featured Schools", "hp-feat-sub": "Choose which schools appear as featured on the homepage (max 6)", "hp-save-feat-txt": "Save Featured",
                "hp-feat-hint": "Check the schools you want to feature on the homepage. Max 6 schools.",
                ok_hp_hero: "Hero section saved!", ok_hp_stats: "Stats bar saved!", ok_hp_types: "Type cards saved!", ok_hp_feat: "Featured schools saved!", hp_feat_max: "Maximum 6 featured schools allowed.",
            },
            ar: {
                "sl-dash": "لوحة التحكم", "sl-schools": "المدارس", "sl-reviews": "التقييمات", "sl-appts": "المواعيد",
                "sl-users": "المستخدمون", "sl-notifs": "الإشعارات", "sl-site": "عرض الموقع", "sl-logout": "تسجيل الخروج",
                "sbs-main": "الرئيسية", "sbs-manage": "الإدارة", "sbs-sys": "النظام",
                "sc-lbl": "إجمالي المدارس", "us-lbl": "المستخدمون المسجلون", "rv-lbl": "إجمالي التقييمات", "ap-lbl": "المواعيد",
                "sc-delta": "↑ بيانات تجريبية", "us-delta": "↑ +3 هذا الأسبوع", "rv-delta": "⚠ 2 بانتظار الموافقة", "ap-delta": "3 قيد المراجعة",
                "ch1-title": "المدارس حسب النوع", "ch2-title": "الأعلى تقييماً", "ra-title": "النشاط الأخير", "ra-view": "عرض الكل",
                "th-user": "المستخدم", "th-action": "الإجراء", "th-school": "المدرسة", "th-time": "الوقت", "th-status": "الحالة",
                "sc-page-title": "كل المدارس", "add-btn-txt": "إضافة مدرسة",
                "th-sc-name": "اسم المدرسة", "th-sc-type": "النوع", "th-sc-loc": "الموقع", "th-sc-fee": "المصاريف", "th-sc-rat": "التقييم", "th-sc-act": "الإجراءات",
                "rv-page-title": "إدارة التقييمات", "rf-all": "الكل", "rf-pend": "قيد الانتظار", "rf-app": "موافق عليها",
                "th-rv-user": "المستخدم", "th-rv-school": "المدرسة", "th-rv-rating": "التقييم", "th-rv-comment": "التعليق", "th-rv-status": "الحالة", "th-rv-act": "الإجراءات",
                "ap-page-title": "إدارة المواعيد", "af-all": "الكل", "af-pend": "قيد الانتظار", "af-conf": "مؤكد", "af-canc": "ملغي",
                "th-ap-user": "المستخدم", "th-ap-school": "المدرسة", "th-ap-date": "التاريخ", "th-ap-msg": "الرسالة", "th-ap-status": "الحالة", "th-ap-act": "الإجراءات",
                "us-page-title": "المستخدمون المسجلون",
                "th-us-name": "الاسم", "th-us-email": "البريد الإلكتروني", "th-us-joined": "تاريخ الانضمام", "th-us-favs": "المفضلة", "th-us-revs": "التقييمات", "th-us-act": "الإجراءات",
                "nt-page-title": "إرسال إشعار", "nt-target-lbl": "إرسال إلى", "nt-all": "كل المستخدمين", "nt-user": "مستخدم محدد",
                "nt-user-lbl": "اختر مستخدم", "nt-title-lbl": "العنوان", "nt-msg-lbl": "الرسالة", "nt-prev-lbl": "معاينة",
                "send-btn-txt": "إرسال الإشعار", "nh-title": "سجل الإشعارات",
                "th-nt-title": "العنوان", "th-nt-target": "المستهدف", "th-nt-sent": "وقت الإرسال", "th-nt-read": "نسبة القراءة",
                "school-modal-title": "إضافة مدرسة", "fm-name": "اسم المدرسة", "fm-type": "النوع", "fm-area": "المنطقة",
                "fm-loc": "الموقع", "fm-fee-min": "الحد الأدنى للمصاريف", "fm-fee-max": "الحد الأقصى للمصاريف", "fm-cur": "العملة",
                "fm-age": "الفئة العمرية", "fm-class": "حجم الفصل", "fm-email": "البريد", "fm-phone": "الهاتف",
                "fm-website": "الموقع", "fm-curricula": "المناهج", "fm-cancel": "إلغاء", "fm-save": "حفظ المدرسة",
                "conf-cancel": "إلغاء", "conf-delete": "حذف",
                ok_school_add: "تم إضافة المدرسة بنجاح!", ok_school_edit: "تم تحديث المدرسة!", ok_school_del: "تم حذف المدرسة.",
                ok_rev_approve: "تمت الموافقة على التقييم!", ok_rev_del: "تم حذف التقييم.",
                ok_appt_confirm: "تم تأكيد الموعد!", ok_appt_cancel: "تم إلغاء الموعد.",
                ok_notif: "تم إرسال الإشعار لجميع المستخدمين!",
                ok_user_del: "تم حذف المستخدم.",
                notif_empty: "يرجى ملء العنوان والرسالة.",
                "sl-homepage": "الصفحة الرئيسية",
                "hp-hero-title": "قسم الهيرو", "hp-hero-sub": "تعديل النص الرئيسي الذي يراه الزوار أولاً",
                "hp-save-hero-txt": "حفظ الهيرو", "hp-badge-lbl": "نص الشارة", "hp-title-lbl": "عنوان الهيرو",
                "hp-subtitle-lbl": "العنوان الفرعي", "hp-btn-lbl": "نص زر البحث", "hp-cta-lbl": "زر الدعوة للعمل",
                "hp-stats-title": "شريط الإحصائيات", "hp-stats-sub": "الأرقام المعروضة في شريط الإحصائيات", "hp-save-stats-txt": "حفظ الإحصائيات",
                "hp-types-title": "بطاقات الأنواع", "hp-types-sub": "تعديل بطاقات أنواع المناهج على الصفحة الرئيسية", "hp-save-types-txt": "حفظ الأنواع",
                "hp-feat-title": "المدارس المميزة", "hp-feat-sub": "اختر المدارس التي تظهر كمميزة على الصفحة الرئيسية (حد أقصى 6)", "hp-save-feat-txt": "حفظ المميزة",
                "hp-feat-hint": "اختر المدارس التي تريد تمييزها على الصفحة الرئيسية. الحد الأقصى 6 مدارس.",
                ok_hp_hero: "تم حفظ قسم الهيرو!", ok_hp_stats: "تم حفظ شريط الإحصائيات!", ok_hp_types: "تم حفظ بطاقات الأنواع!", ok_hp_feat: "تم حفظ المدارس المميزة!", hp_feat_max: "الحد الأقصى 6 مدارس مميزة.",
            }
        };

        /* ═══════════════════════════════════════
           STATE
           ═══════════════════════════════════════ */
        let lang = '{{ app()->getLocale() }}', activePage = 'dashboard', deleteTarget = null, deleteType = null;
        const t = k => (TR[lang][k] || TR.en[k] || k);

        /* ═══════════════════════════════════════
           LANGUAGE
           ═══════════════════════════════════════ */
        function toggleLang() {
            lang = lang === 'en' ? 'ar' : 'en';
            document.documentElement.lang = lang;
            document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
            document.getElementById('lang-lbl').textContent = lang === 'en' ? 'EN' : 'AR';
            applyTR();
            renderCurrentPage();
        }
        function applyTR() {
            Object.keys(TR.en).forEach(k => {
                if (k.startsWith('ok_') || k.startsWith('notif_')) return;
                const el = document.getElementById(k);
                if (el) el.textContent = t(k);
            });
        }

        /* ═══════════════════════════════════════
           PAGE NAVIGATION
           ═══════════════════════════════════════ */
        const PAGES = ['dashboard', 'schools', 'reviews', 'appointments', 'users', 'notifications', 'homepage'];
        function showPage(page, el) {
            PAGES.forEach(p => {
                const pg = document.getElementById('page-' + p);
                if (pg) pg.style.display = p === page ? 'block' : 'none';
            });
            document.querySelectorAll('.sb-item').forEach(i => i.classList.remove('act'));
            if (el) el.classList.add('act');
            activePage = page;
            const titles = {
                dashboard: t('sl-dash'), schools: t('sl-schools'), reviews: t('sl-reviews'),
                appointments: t('sl-appts'), users: t('sl-users'),
                notifications: t('sl-notifs'), homepage: t('sl-homepage')
            };
            const adminLabel = lang === 'ar' ? 'الإدارة' : 'Admin';
            document.getElementById('page-title').textContent = titles[page] || page;
            document.getElementById('breadcrumb').textContent = `${adminLabel} / ${titles[page] || page}`;
            // homepage page is outside .content — handle visibility
            const hpPage = document.getElementById('page-homepage');
            const mainContent = document.getElementById('content');
            if (page === 'homepage') {
                mainContent.style.display = 'none';
                hpPage.style.display = 'block';
                hpPage.style.padding = '2rem';
                renderHomepageMgr();
            } else {
                mainContent.style.display = 'block';
                hpPage.style.display = 'none';
                if (page === 'dashboard') loadStats();
                else if (page === 'schools') loadSchools();
                else if (page === 'reviews') loadReviews();
                else if (page === 'appointments') loadAppointments();
                else if (page === 'users') loadUsers();
                else renderCurrentPage();
            }
        }
        function renderCurrentPage() {
            if (activePage === 'dashboard') renderActivity();
            else if (activePage === 'schools') renderSchoolTable();
            else if (activePage === 'reviews') renderRevTable();
            else if (activePage === 'appointments') renderApptTable();
            else if (activePage === 'users') renderUserTable();
            else if (activePage === 'notifications') renderNotifHistory();
        }

        /* ═══════════════════════════════════════
           ACTIVITY TABLE
           ═══════════════════════════════════════ */
        function renderActivity() {
            document.getElementById('activity-body').innerHTML = ACTIVITY.map(a => `
    <tr>
      <td><div class="tbl-name">${a.user || '—'}</div></td>
      <td>${a.action || '—'}</td>
      <td><div class="tbl-sub">${a.school || '—'}</div></td>
      <td style="color:var(--muted);font-size:.8rem">${a.time || '—'}</td>
      <td><span class="badge b-${a.status || 'pending'}">${a.status || '—'}</span></td>
    </tr>`).join('') || `<tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--muted)">${lang === 'ar' ? 'لا يوجد نشاط حديث' : 'No recent activity'}</td></tr>`;
        }

        async function loadStats() {
            try {
                const res = await fetch(`${API_BASE}/admin/stats`, { headers: authHeaders() });
                const json = await res.json();
                if (!json.success) return;
                const d = json.data;
                document.getElementById('sc-total').textContent = d.total_schools;
                document.getElementById('us-total').textContent = d.total_users;
                document.getElementById('rv-total').textContent = d.total_reviews;
                document.getElementById('ap-total').textContent = d.total_appointments;
                document.getElementById('sc-delta').textContent = lang === 'ar'
                    ? `${d.total_schools} مدرسة نشطة`
                    : `${d.total_schools} active schools`;
                document.getElementById('rv-delta').textContent = lang === 'ar'
                    ? `⚠ ${d.pending_reviews} بانتظار الموافقة`
                    : `⚠ ${d.pending_reviews} pending approval`;
                document.getElementById('ap-delta').textContent = lang === 'ar'
                    ? `${d.pending_appointments} قيد المراجعة`
                    : `${d.pending_appointments} pending review`;
                ACTIVITY = d.recent_activity || [];
                renderActivity();
            } catch (e) { console.error('Failed to load stats', e); }
        }

        /* ═══════════════════════════════════════
           SCHOOLS TABLE
           ═══════════════════════════════════════ */
        function renderSchoolTable(data = SCHOOLS) {
            const typeClass = { British: 'b-british', American: 'b-american', German: 'b-german', French: 'b-french' };
            document.getElementById('schools-body').innerHTML = data.map(s => `
    <tr>
      <td>
        <div class="tbl-name">${s.name}</div>
        <div class="tbl-sub">${s.area || ''}</div>
      </td>
      <td><span class="badge ${typeClass[s.type] || 'b-british'}">${s.type || ''}</span></td>
      <td style="font-size:.83rem;color:var(--muted)">${s.city || s.location || ''}</td>
      <td style="font-size:.83rem">${s.feeDisplay || '—'}</td>
      <td><span class="stars">${'★'.repeat(Math.floor(s.rating || 0))}</span> <strong style="font-size:.82rem">${s.rating || '—'}</strong></td>
      <td>
        <div class="action-btns">
          <div class="icon-btn" onclick="openSchoolModal(${s.id})" title="Edit">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          </div>
          <div class="icon-btn" onclick="${s.is_school_of_month ? `removeFeatured(${s.id})` : `setFeatured(${s.id})`}"
               title="${s.is_school_of_month ? 'Remove Featured' : 'Set as School of Month'}"
               style="${s.is_school_of_month ? 'border-color:var(--warn);color:var(--warn);' : ''}font-size:.9rem">★</div>
          <div class="icon-btn del" onclick="askDelete('school',${s.id},'${s.name.replace(/'/g, "\\'")})" title="Delete">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3,6 5,6 21,6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
          </div>
        </div>
      </td>
    </tr>`).join('') || '<tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--muted)">No schools found</td></tr>';
            document.getElementById('sc-tbl-info').textContent = `Showing ${data.length} of ${SCHOOLS.length} schools`;
        }
        function filterSchoolTable() {
            const q = document.getElementById('school-search').value.toLowerCase();
            renderSchoolTable(SCHOOLS.filter(s => s.name.toLowerCase().includes(q) || (s.type || '').toLowerCase().includes(q) || (s.city || s.location || '').toLowerCase().includes(q)));
        }

        async function loadSchools() {
            try {
                const res = await fetch(`${API_BASE}/admin/schools`, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) { SCHOOLS = json.data || []; renderSchoolTable(); }
            } catch (e) { console.error('Failed to load schools', e); }
        }

        async function setFeatured(id) {
            const r = await sfForm(
                'Set School of the Month',
                'This school will be highlighted on the homepage.',
                [
                    { key:'badge', label:'Badge Text', placeholder:'e.g. School of the Month 🏆', type:'text' },
                    { key:'date',  label:'Featured Until', placeholder:'YYYY-MM-DD', type:'date' },
                ],
                '⭐',
                'Set Featured'
            );
            if (r.action !== 'submit') return;
            const badge = r.values.badge;
            const until = r.values.date;
            if (!badge || !until) return;
            try {
                const res = await fetch(`${API_BASE}/admin/schools/${id}/set-featured`, {
                    method: 'PUT', headers: authHeaders(),
                    body: JSON.stringify({ badge_text: badge, featured_until: until })
                });
                const json = await res.json();
                if (json.success) { toast('School of the Month set! ⭐', 'ok'); loadSchools(); }
                else toast(json.message || 'Error', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        async function removeFeatured(id) {
            try {
                const res = await fetch(`${API_BASE}/admin/schools/${id}/remove-featured`, {
                    method: 'PUT', headers: authHeaders()
                });
                const json = await res.json();
                if (json.success) { toast('Featured status removed.', 'inf'); loadSchools(); }
                else toast(json.message || 'Error', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        /* ═══════════════════════════════════════
           SCHOOL MODAL (Add / Edit)
           ═══════════════════════════════════════ */
        function openSchoolModal(id = null) {
            const modal = document.getElementById('schoolModal');
            const titleEl = document.getElementById('school-modal-title');
            if (id) {
                const s = SCHOOLS.find(x => x.id === id);
                titleEl.textContent = lang === 'ar' ? 'تعديل المدرسة' : 'Edit School';
                document.getElementById('edit-school-id').value = id;
                document.getElementById('fm-name-input').value = s.name;
                document.getElementById('fm-type-input').value = s.type || 'British';
                document.getElementById('fm-area-input').value = s.area || '';
                document.getElementById('fm-loc-input').value = s.city || '';
                document.getElementById('fm-fee-min-input').value = s.feeMin || '';
                document.getElementById('fm-fee-max-input').value = s.feeMax || '';
                document.getElementById('fm-cur-input').value = s.currency || 'EGP';
                document.getElementById('fm-age-input').value = s.age_min && s.age_max ? `${s.age_min}-${s.age_max}` : '';
                document.getElementById('fm-class-input').value = s.class_size_avg || '';
                document.getElementById('fm-email-input').value = s.email || '';
                document.getElementById('fm-phone-input').value = s.phone || '';
                document.getElementById('fm-website-input').value = s.website || '';
                document.getElementById('fm-curricula-input').value = Array.isArray(s.curricula) ? s.curricula.join(', ') : (s.curricula || '');
            } else {
                titleEl.textContent = lang === 'ar' ? 'إضافة مدرسة' : 'Add School';
                document.getElementById('edit-school-id').value = '';
                ['fm-name-input', 'fm-area-input', 'fm-fee-min-input', 'fm-fee-max-input', 'fm-age-input', 'fm-class-input', 'fm-email-input', 'fm-phone-input', 'fm-website-input', 'fm-curricula-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('fm-type-input').value = 'British';
                document.getElementById('fm-loc-input').value = 'New Cairo';
                document.getElementById('fm-cur-input').value = 'EGP';
            }
            modal.classList.add('open');
        }
        async function saveSchool() {
            const editId = document.getElementById('edit-school-id').value;
            const typeName = document.getElementById('fm-type-input').value;
            const curriculaStr = document.getElementById('fm-curricula-input').value;
            const curriculaIds = [...new Set(curriculaStr.split(',').map(c => c.trim()).map(c => CURRICULUM_MAP[c]).filter(Boolean))];
            const ageParts = (document.getElementById('fm-age-input').value || '3-18').split('-');
            const payload = {
                name: document.getElementById('fm-name-input').value,
                type_id: TYPE_MAP[typeName] || 1,
                area: document.getElementById('fm-area-input').value,
                city: document.getElementById('fm-loc-input').value,
                fee_min: parseFloat(document.getElementById('fm-fee-min-input').value) || 0,
                fee_max: parseFloat(document.getElementById('fm-fee-max-input').value) || 0,
                currency: document.getElementById('fm-cur-input').value || 'EGP',
                age_min: parseInt(ageParts[0]) || 3,
                age_max: parseInt(ageParts[1]) || 18,
                class_size_avg: parseInt(document.getElementById('fm-class-input').value) || null,
                email: document.getElementById('fm-email-input').value,
                phone: document.getElementById('fm-phone-input').value,
                website: document.getElementById('fm-website-input').value || null,
                curricula: curriculaIds.length ? curriculaIds : [1],
            };
            const btn = document.getElementById('fm-save');
            btn.disabled = true;
            try {
                const url = editId ? `${API_BASE}/admin/schools/${editId}` : `${API_BASE}/admin/schools`;
                const res = await fetch(url, { method: editId ? 'PUT' : 'POST', headers: authHeaders(), body: JSON.stringify(payload) });
                const json = await res.json();
                if (json.success) {
                    document.getElementById('schoolModal').classList.remove('open');
                    toast(t(editId ? 'ok_school_edit' : 'ok_school_add'), 'ok');
                    await loadSchools();
                    await loadStats();
                } else { toast(json.message || 'Error saving school', 'err'); }
            } catch (e) { toast('Network error', 'err'); }
            finally { btn.disabled = false; }
        }

        /* ═══════════════════════════════════════
           REVIEWS TABLE
           ═══════════════════════════════════════ */
        function renderRevTable(data = null) {
            const filter = document.getElementById('rev-filter')?.value || 'all';
            const list = data || (filter === 'all' ? REVIEWS : REVIEWS.filter(r => filter === 'approved' ? r.is_approved : !r.is_approved));
            document.getElementById('reviews-body').innerHTML = list.map(r => `
    <tr>
      <td><div class="tbl-name">${r.user_name || r.user || '—'}</div><div class="tbl-sub">${r.date || ''}</div></td>
      <td style="font-size:.83rem">${r.school_name || r.school || '—'}</td>
      <td><span class="stars">${'★'.repeat(r.rating || 0)}</span></td>
      <td style="font-size:.83rem;max-width:200px;color:var(--muted)">${(r.comment || '').substring(0, 50)}${(r.comment || '').length > 50 ? '...' : ''}</td>
      <td><span class="badge ${r.is_approved ? 'b-approved' : 'b-pending'}">${r.is_approved ? 'approved' : 'pending'}</span></td>
      <td>
        <div class="action-btns">
          ${!r.is_approved ? `<div class="icon-btn app" onclick="approveRev(${r.id})" title="Approve">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20,6 9,17 4,12"/></svg>
          </div>`: ''}
          <div class="icon-btn del" onclick="askDelete('review',${r.id},'this review')" title="Delete">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3,6 5,6 21,6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
          </div>
        </div>
      </td>
    </tr>`).join('') || '<tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--muted)">No reviews found</td></tr>';
            document.getElementById('rev-tbl-info').textContent = `Showing ${list.length} of ${REVIEWS.length} reviews`;
            document.getElementById('rev-badge').textContent = REVIEWS.filter(r => !r.is_approved).length;
        }
        function filterRevTable() { renderRevTable(); }
        async function approveRev(id) {
            try {
                const res = await fetch(`${API_BASE}/admin/reviews/${id}/approve`, { method: 'PUT', headers: authHeaders() });
                const json = await res.json();
                if (json.success) {
                    const r = REVIEWS.find(x => x.id === id);
                    if (r) r.is_approved = true;
                    renderRevTable(); toast(t('ok_rev_approve'), 'ok');
                } else toast(json.message || 'Error', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        async function loadReviews() {
            try {
                const filter = document.getElementById('rev-filter')?.value || 'all';
                const url = filter === 'all' ? `${API_BASE}/admin/reviews` : `${API_BASE}/admin/reviews?filter=${filter}`;
                const res = await fetch(url, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) { REVIEWS = json.data || []; renderRevTable(); }
            } catch (e) { console.error('Failed to load reviews', e); }
        }

        /* ═══════════════════════════════════════
           APPOINTMENTS TABLE
           ═══════════════════════════════════════ */
        function renderApptTable() {
            const filter = document.getElementById('appt-filter')?.value || 'all';
            const list = filter === 'all' ? APPOINTMENTS : APPOINTMENTS.filter(a => a.status === filter);
            document.getElementById('appts-body').innerHTML = list.map(a => `
    <tr>
      <td><div class="tbl-name">${a.user_name || '—'}</div><div class="tbl-sub">${a.user_email || ''}</div></td>
      <td style="font-size:.83rem">${a.school_name || '—'}</td>
      <td style="font-size:.83rem;color:var(--muted)">${a.preferred_date || '—'}</td>
      <td style="font-size:.8rem;color:var(--muted);max-width:180px">${(a.message || '').substring(0, 50)}${(a.message||'').length>50?'...':''}</td>
      <td>
        <span class="badge b-${a.status}">${a.status}</span>
        ${a.status==='cancelled'&&a.cancel_reason?`<div style="font-size:.72rem;color:#991B1B;margin-top:.2rem">${a.cancel_reason}</div>`:''}
        ${a.status==='attention'&&a.attention_note?`<div style="font-size:.72rem;color:#1D4ED8;margin-top:.2rem">⚠️ ${a.attention_note}</div>`:''}
      </td>
      <td>
        <div class="action-btns">
          ${a.status === 'pending' ? `
          <div class="icon-btn app" onclick="updateAppt(${a.id},'confirmed')" title="Confirm">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20,6 9,17 4,12"/></svg>
          </div>
          <div class="icon-btn del" onclick="updateAppt(${a.id},'cancelled')" title="Cancel">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
          </div>
          <div class="icon-btn" onclick="updateAppt(${a.id},'attention')" title="Needs Attention" style="background:#EFF6FF;color:#1D4ED8;border:1px solid #BFDBFE;font-size:.8rem">⚠️</div>
          ` : '<span style="font-size:.76rem;color:var(--muted)">—</span>'}
        </div>
      </td>
    </tr>`).join('') || '<tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--muted)">No appointments found</td></tr>';
            document.getElementById('ap-tbl-info').textContent = `Showing ${list.length} of ${APPOINTMENTS.length} appointments`;
            document.getElementById('appt-badge').textContent = APPOINTMENTS.filter(a => a.status === 'pending').length;
        }
        function filterApptTable() { loadAppointments(); }
        async function updateAppt(id, status) {
            let body = { status };
            if (status === 'confirmed') {
                const r = await sfForm(
                    lang==='ar'?'تأكيد الموعد':'Confirm Appointment',
                    lang==='ar'?'حدد تاريخ الزيارة المؤكدة لهذا الوالد.':'Set the confirmed visit date for this parent.',
                    [
                        { key:'date',      label: lang==='ar'?'* تاريخ الزيارة المؤكدة':'* Confirmed Visit Date', placeholder:'YYYY-MM-DD', type:'date' },
                        { key:'adminNote', label: lang==='ar'?'ملاحظة للوالدين (اختياري)':'Note to parent (optional)', placeholder: lang==='ar'?'مثال: يرجى إحضار وثائق طفلك':"e.g. Please bring your child's documents", type:'text' },
                    ],
                    '✅', lang==='ar'?'تأكيد الزيارة':'Confirm Visit'
                );
                if (r.action !== 'submit') return;
                body.confirmed_date = r.values.date;
                body.admin_note = r.values.adminNote;
                if (!body.confirmed_date) { toast(lang==='ar'?'يرجى اختيار تاريخ التأكيد':'Please select a confirmed date', 'err'); return; }
            } else if (status === 'cancelled') {
                const r = await sfForm(
                    lang==='ar'?'إلغاء الموعد':'Cancel Appointment',
                    lang==='ar'?'يرجى تقديم سبب. سيظهر هذا للوالدين.':'Please provide a reason. This will be shown to the parent.',
                    [
                        { key:'reason',    label: lang==='ar'?'* سبب الإلغاء (يظهر للوالدين)':'* Cancellation Reason (shown to parent)', placeholder: lang==='ar'?'مثال: المدرسة محجوزة بالكامل':'e.g. School fully booked on that date', type:'textarea' },
                        { key:'adminNote', label: lang==='ar'?'ملاحظة داخلية (اختياري)':'Internal Note (optional)', placeholder: lang==='ar'?'لا يظهر للوالدين':'Not shown to parent', type:'text' },
                    ],
                    '❌', lang==='ar'?'تأكيد الإلغاء':'Confirm Cancellation'
                );
                if (r.action !== 'submit') return;
                body.cancel_reason = r.values.reason;
                body.admin_note = r.values.adminNote;
                if (!body.cancel_reason) { toast(lang==='ar'?'يرجى إدخال سبب الإلغاء':'Please enter a cancellation reason', 'err'); return; }
            } else if (status === 'attention') {
                const r = await sfForm(
                    lang==='ar'?'إرسال تنبيه':'Send Attention Notice',
                    lang==='ar'?'ستظهر هذه الرسالة للوالدين.':'This message will be shown to the parent.',
                    [
                        { key:'note',      label: lang==='ar'?'* رسالة للوالدين':'* Message to Parent', placeholder: lang==='ar'?'مثال: يرجى تقديم الشهادات الدراسية':"e.g. Please provide your child's current grade", type:'textarea' },
                        { key:'adminNote', label: lang==='ar'?'ملاحظة داخلية (اختياري)':'Internal Note (optional)', placeholder: lang==='ar'?'لا يظهر للوالدين':'Not shown to parent', type:'text' },
                    ],
                    '⚠️', lang==='ar'?'إرسال التنبيه':'Send Notice'
                );
                if (r.action !== 'submit') return;
                body.attention_note = r.values.note;
                body.admin_note = r.values.adminNote;
                if (!body.attention_note) { toast(lang==='ar'?'يرجى كتابة رسالة للوالدين':'Please write a message to the parent', 'err'); return; }
            }
            try {
                const res = await fetch(`${API_BASE}/admin/appointments/${id}/status`, {
                    method: 'PUT', headers: authHeaders(), body: JSON.stringify(body)
                });
                const json = await res.json();
                if (json.success) { toast(lang==='ar'?'تم تحديث الموعد!':'Appointment updated!', 'ok'); loadAppointments(); }
                else toast(json.message || (lang==='ar'?'فشل التحديث':'Failed to update'), 'err');
            } catch (e) { toast(lang==='ar'?'خطأ في الشبكة':'Network error', 'err'); }
        }

        async function loadAppointments() {
            try {
                const filter = document.getElementById('appt-filter')?.value || 'all';
                const url = filter === 'all' ? `${API_BASE}/admin/appointments` : `${API_BASE}/admin/appointments?filter=${filter}`;
                const res = await fetch(url, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) { APPOINTMENTS = json.data || []; renderApptTable(); }
            } catch (e) { console.error('Failed to load appointments', e); }
        }

        /* ═══════════════════════════════════════
           USERS TABLE
           ═══════════════════════════════════════ */
        function renderUserTable(data = USERS) {
            document.getElementById('users-body').innerHTML = data.map(u => `
    <tr>
      <td><div class="tbl-name">${u.name}</div></td>
      <td style="font-size:.83rem;color:var(--muted)">${u.email}</td>
      <td style="font-size:.8rem;color:var(--muted)">${u.joined || ''}</td>
      <td style="font-size:.83rem;text-align:center">${u.favorites_count ?? u.favs ?? 0}</td>
      <td style="font-size:.83rem;text-align:center">${u.reviews_count ?? u.reviews ?? 0}</td>
      <td>
        <div class="action-btns">
          <div class="icon-btn del" onclick="askDelete('user',${u.id},'${u.name.replace(/'/g, "\\'")}')" title="Remove">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3,6 5,6 21,6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
          </div>
        </div>
      </td>
    </tr>`).join('') || '<tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--muted)">No users found</td></tr>';
            document.getElementById('us-tbl-info').textContent = `Showing ${data.length} of ${USERS.length} users`;
        }
        function filterUserTable() {
            const q = document.getElementById('user-search').value.toLowerCase();
            renderUserTable(USERS.filter(u => u.name.toLowerCase().includes(q) || u.email.toLowerCase().includes(q)));
        }

        async function loadUsers() {
            try {
                const res = await fetch(`${API_BASE}/admin/users`, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) { USERS = json.data || []; renderUserTable(); }
            } catch (e) { console.error('Failed to load users', e); }
        }

        /* ═══════════════════════════════════════
           NOTIFICATIONS
           ═══════════════════════════════════════ */
        document.addEventListener('DOMContentLoaded', () => {
            const tgt = document.getElementById('nt-target');
            if (tgt) tgt.addEventListener('change', function () {
                document.getElementById('nt-user-field').style.display = this.value === 'user' ? 'block' : 'none';
            });
        });
        function updatePreview() {
            const title = document.getElementById('nt-title').value || 'Notification Title';
            const msg = document.getElementById('nt-msg').value || 'Your message will appear here...';
            document.getElementById('prev-title').textContent = title;
            document.getElementById('prev-msg').textContent = msg;
        }
        async function sendNotification() {
            const title = document.getElementById('nt-title').value.trim();
            const msg = document.getElementById('nt-msg').value.trim();
            if (!title || !msg) { toast(t('notif_empty'), 'err'); return; }
            const target = document.getElementById('nt-target')?.value || 'all';
            const userId = document.getElementById('nt-user-select')?.value || null;
            const payload = { title, message: msg, target };
            if (target === 'user' && userId) payload.user_id = parseInt(userId);
            const btn = document.getElementById('send-notif-btn');
            btn.disabled = true;
            try {
                const res = await fetch(`${API_BASE}/admin/notifications/send`, { method: 'POST', headers: authHeaders(), body: JSON.stringify(payload) });
                const json = await res.json();
                if (json.success) {
                    NOTIF_HISTORY.unshift({ title, target: target === 'all' ? 'All Users' : 'Specific User', sent: new Date().toLocaleString(), read: '0' });
                    document.getElementById('nt-title').value = '';
                    document.getElementById('nt-msg').value = '';
                    updatePreview();
                    renderNotifHistory();
                    toast(`${t('ok_notif')} (${json.data?.count || 0} users)`, 'ok');
                } else toast(json.message || 'Error sending notification', 'err');
            } catch (e) { toast('Network error', 'err'); }
            finally { btn.disabled = false; }
        }
        function renderNotifHistory() {
            document.getElementById('notif-history').innerHTML = NOTIF_HISTORY.map(n => `
    <tr>
      <td><div class="tbl-name" style="font-size:.85rem">${n.title}</div></td>
      <td><span class="badge b-approved">${n.target}</span></td>
      <td style="font-size:.8rem;color:var(--muted)">${n.sent}</td>
      <td style="font-size:.83rem;font-weight:600;color:var(--teal)">${n.read}</td>
    </tr>`).join('');
        }

        /* ═══════════════════════════════════════
           DELETE FLOW
           ═══════════════════════════════════════ */
        function askDelete(type, id, name) {
            deleteTarget = { type, id };
            const L = lang === 'ar';
            document.getElementById('confirm-title').textContent =
                type === 'school' ? (L ? `حذف مدرسة "${name}"؟` : `Delete "${name}"?`) :
                    type === 'review' ? (L ? 'حذف هذا التقييم؟' : 'Delete this review?') :
                        (L ? `حذف المستخدم "${name}"؟` : `Remove user "${name}"?`);
            document.getElementById('confirm-sub').textContent = L ? 'هذا الإجراء لا يمكن التراجع عنه.' : 'This action cannot be undone.';
            document.getElementById('confirmModal').classList.add('open');
        }
        async function confirmDelete() {
            if (!deleteTarget) return;
            const { type, id } = deleteTarget;
            const urlMap = { school: `${API_BASE}/admin/schools/${id}`, review: `${API_BASE}/admin/reviews/${id}`, user: `${API_BASE}/admin/users/${id}` };
            document.getElementById('confirmModal').classList.remove('open');
            deleteTarget = null;
            try {
                const res = await fetch(urlMap[type], { method: 'DELETE', headers: authHeaders() });
                const json = await res.json();
                if (json.success) {
                    if (type === 'school') { toast(t('ok_school_del'), 'inf'); await loadSchools(); await loadStats(); }
                    else if (type === 'review') { toast(t('ok_rev_del'), 'inf'); await loadReviews(); await loadStats(); }
                    else if (type === 'user') { toast(t('ok_user_del'), 'inf'); await loadUsers(); await loadStats(); }
                } else toast(json.message || 'Delete failed', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        /* ═══════════════════════════════════════
           HOMEPAGE MANAGEMENT
           ═══════════════════════════════════════ */

        // State — in real app this comes from DB via Laravel API
        let HP_STATE = {
            badge: '105+ International Schools in Cairo',
            title: 'Find the Perfect International School for Your Child',
            subtitle: 'Search, compare, and evaluate international schools in Cairo — all in one place. Save hours of research with powerful filters and real parent reviews.',
            btnText: 'Search Schools →',
            ctaText: 'Browse All Schools',
            stats: [
                { val: '105+', lbl: 'International Schools' },
                { val: '7', lbl: 'Curriculum Types' },
                { val: '500+', lbl: 'Parent Reviews' },
                { val: 'Free', lbl: 'Always Free to Use' },
            ],
            types: [
                { emoji: '🇬🇧', name: 'British', count: 45, bg: '#EEF2FF' },
                { emoji: '🇺🇸', name: 'American', count: 28, bg: '#FFF7ED' },
                { emoji: '🇩🇪', name: 'German', count: 6, bg: '#F0FDF4' },
                { emoji: '🇫🇷', name: 'French', count: 4, bg: '#FFF1F2' },
                { emoji: '🌐', name: 'IB / Intl.', count: 22, bg: '#F0F9FF' },
            ],
            featured: [1, 2, 3, 4, 5], // school IDs
        };

        async function renderHomepageMgr() {
            // Fetch settings from API and merge into HP_STATE
            try {
                const res = await fetch(`${API_BASE}/admin/homepage/settings`, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) {
                    const s = json.data;
                    if (s.hero) { HP_STATE.badge = s.hero.badge || HP_STATE.badge; HP_STATE.title = s.hero.title || HP_STATE.title; HP_STATE.subtitle = s.hero.subtitle || HP_STATE.subtitle; HP_STATE.btnText = s.hero.btn_text || HP_STATE.btnText; HP_STATE.ctaText = s.hero.cta_text || HP_STATE.ctaText; }
                    if (s.stats) HP_STATE.stats = s.stats.map(x => ({ val: x.value, lbl: x.label }));
                    if (s.types) HP_STATE.types = s.types.map((x, i) => ({ emoji: x.icon || HP_STATE.types[i]?.emoji || '🏫', name: x.name, count: x.count, bg: HP_STATE.types[i]?.bg || '#F0F6FF' }));
                    if (s.featured) HP_STATE.featured = s.featured;
                }
            } catch (e) { }

            // Fill hero fields
            document.getElementById('hp-badge').value = HP_STATE.badge;
            document.getElementById('hp-title').value = HP_STATE.title;
            document.getElementById('hp-subtitle').value = HP_STATE.subtitle;
            document.getElementById('hp-btn').value = HP_STATE.btnText;
            document.getElementById('hp-cta').value = HP_STATE.ctaText;
            syncHeroPreview();

            // Fill stats fields
            HP_STATE.stats.forEach((s, i) => {
                document.getElementById(`st${i + 1}-val`).value = s.val;
                document.getElementById(`st${i + 1}-lbl`).value = s.lbl;
            });
            syncStatsPreview();

            // Render type card editors
            renderTypeFields();
            renderTypesPreview();

            // Ensure schools loaded for featured checkboxes
            if (!SCHOOLS.length) await loadSchools();
            // Render featured checkboxes
            renderFeaturedCheckboxes();

            // Wire live preview updates
            ['hp-badge', 'hp-title', 'hp-subtitle', 'hp-btn'].forEach(id => {
                document.getElementById(id).oninput = syncHeroPreview;
            });
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`st${i}-val`).oninput = syncStatsPreview;
                document.getElementById(`st${i}-lbl`).oninput = syncStatsPreview;
            }
        }

        // ── Hero ──
        function syncHeroPreview() {
            document.getElementById('prev-badge').textContent = document.getElementById('hp-badge').value || '...';
            document.getElementById('prev-title').textContent = document.getElementById('hp-title').value || '...';
            document.getElementById('prev-subtitle').textContent = document.getElementById('hp-subtitle').value || '...';
            document.getElementById('prev-btn').textContent = document.getElementById('hp-btn').value || '...';
        }
        async function saveHero() {
            HP_STATE.badge = document.getElementById('hp-badge').value;
            HP_STATE.title = document.getElementById('hp-title').value;
            HP_STATE.subtitle = document.getElementById('hp-subtitle').value;
            HP_STATE.btnText = document.getElementById('hp-btn').value;
            HP_STATE.ctaText = document.getElementById('hp-cta').value;
            try {
                const res = await fetch(`${API_BASE}/admin/homepage/hero`, {
                    method: 'POST', headers: authHeaders(),
                    body: JSON.stringify({ badge: HP_STATE.badge, title: HP_STATE.title, subtitle: HP_STATE.subtitle, btn_text: HP_STATE.btnText, cta_text: HP_STATE.ctaText })
                });
                const json = await res.json();
                toast(json.success ? t('ok_hp_hero') : json.message || 'Error', json.success ? 'ok' : 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        // ── Stats ──
        function syncStatsPreview() {
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`pst${i}-val`).textContent = document.getElementById(`st${i}-val`).value || '—';
                document.getElementById(`pst${i}-lbl`).textContent = document.getElementById(`st${i}-lbl`).value || '—';
            }
        }
        async function saveStats() {
            for (let i = 0; i < 4; i++) {
                HP_STATE.stats[i].val = document.getElementById(`st${i + 1}-val`).value;
                HP_STATE.stats[i].lbl = document.getElementById(`st${i + 1}-lbl`).value;
            }
            const stats = HP_STATE.stats.map(s => ({ value: s.val, label: s.lbl }));
            try {
                const res = await fetch(`${API_BASE}/admin/homepage/stats`, { method: 'POST', headers: authHeaders(), body: JSON.stringify({ stats }) });
                const json = await res.json();
                toast(json.success ? t('ok_hp_stats') : json.message || 'Error', json.success ? 'ok' : 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        // ── Type Cards ──
        function renderTypeFields() {
            document.getElementById('types-fields').innerHTML = HP_STATE.types.map((tp, i) => `
    <div style="background:#F8FAFF;border:1.5px solid var(--border);border-radius:10px;padding:.9rem">
      <div style="font-size:.78rem;font-weight:700;color:var(--navy);margin-bottom:.6rem;text-align:center">${tp.emoji} Card ${i + 1}</div>
      <div class="field" style="margin-bottom:.5rem"><label style="font-size:.75rem">Emoji</label>
        <input class="fi" style="font-size:1.1rem;text-align:center;padding:.4rem" type="text" id="tc${i}-emoji" value="${tp.emoji}" oninput="syncTypePreview()"></div>
      <div class="field" style="margin-bottom:.5rem"><label style="font-size:.75rem">Name</label>
        <input class="fi" style="font-size:.83rem" type="text" id="tc${i}-name" value="${tp.name}" oninput="syncTypePreview()"></div>
      <div class="field" style="margin-bottom:0"><label style="font-size:.75rem">School Count</label>
        <input class="fi" style="font-size:.83rem" type="number" id="tc${i}-count" value="${tp.count}" oninput="syncTypePreview()"></div>
    </div>`).join('');
        }
        function renderTypesPreview() {
            document.getElementById('types-preview').innerHTML = HP_STATE.types.map((tp, i) => `
    <div id="tp-prev-${i}" style="background:white;border:2px solid var(--border);border-radius:10px;padding:.9rem;text-align:center">
      <div style="width:40px;height:40px;border-radius:11px;background:${tp.bg};margin:0 auto .5rem;display:flex;align-items:center;justify-content:center;font-size:1.1rem">${tp.emoji}</div>
      <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:.82rem;color:var(--navy)">${tp.name}</div>
      <div style="font-size:.72rem;color:var(--muted)">${tp.count} schools</div>
    </div>`).join('');
        }
        function syncTypePreview() {
            HP_STATE.types.forEach((tp, i) => {
                const emoji = document.getElementById(`tc${i}-emoji`)?.value || tp.emoji;
                const name = document.getElementById(`tc${i}-name`)?.value || tp.name;
                const count = document.getElementById(`tc${i}-count`)?.value || tp.count;
                const prev = document.getElementById(`tp-prev-${i}`);
                if (prev) prev.innerHTML = `
      <div style="width:40px;height:40px;border-radius:11px;background:${tp.bg};margin:0 auto .5rem;display:flex;align-items:center;justify-content:center;font-size:1.1rem">${emoji}</div>
      <div style="font-family:'Sora',sans-serif;font-weight:700;font-size:.82rem;color:var(--navy)">${name}</div>
      <div style="font-size:.72rem;color:var(--muted)">${count} schools</div>`;
            });
        }
        async function saveTypes() {
            HP_STATE.types.forEach((tp, i) => {
                tp.emoji = document.getElementById(`tc${i}-emoji`)?.value || tp.emoji;
                tp.name = document.getElementById(`tc${i}-name`)?.value || tp.name;
                tp.count = parseInt(document.getElementById(`tc${i}-count`)?.value) || tp.count;
            });
            renderTypeFields();
            renderTypesPreview();
            const types = HP_STATE.types.map(tp => ({ name: tp.name, count: String(tp.count), icon: tp.emoji }));
            try {
                const res = await fetch(`${API_BASE}/admin/homepage/types`, { method: 'POST', headers: authHeaders(), body: JSON.stringify({ types }) });
                const json = await res.json();
                toast(json.success ? t('ok_hp_types') : json.message || 'Error', json.success ? 'ok' : 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        // ── Featured Schools ──
        function renderFeaturedCheckboxes() {
            document.getElementById('feat-checkboxes').innerHTML = SCHOOLS.map(s => {
                const checked = HP_STATE.featured.includes(s.id);
                return `
    <label style="display:flex;align-items:center;gap:.7rem;background:${checked ? '#E8F5F2' : '#F8FAFF'};border:1.5px solid ${checked ? 'var(--teal)' : 'var(--border)'};border-radius:10px;padding:.7rem .9rem;cursor:pointer;transition:all .2s" id="feat-label-${s.id}">
      <input type="checkbox" ${checked ? 'checked' : ''} id="feat-cb-${s.id}" onchange="toggleFeatured(${s.id})" style="accent-color:var(--teal);width:15px;height:15px;cursor:pointer">
      <div>
        <div style="font-family:'Sora',sans-serif;font-weight:600;font-size:.84rem;color:var(--navy)">${s.name}</div>
        <div style="font-size:.74rem;color:var(--muted)">${s.type || ''} · ${s.area || ''}</div>
      </div>
    </label>`;
            }).join('') || '<div style="color:var(--muted);font-size:.85rem">No schools available</div>';
        }
        function toggleFeatured(id) {
            const checked = document.getElementById(`feat-cb-${id}`).checked;
            if (checked) {
                if (HP_STATE.featured.length >= 6) {
                    document.getElementById(`feat-cb-${id}`).checked = false;
                    toast(t('hp_feat_max'), 'err');
                    return;
                }
                HP_STATE.featured.push(id);
            } else {
                HP_STATE.featured = HP_STATE.featured.filter(x => x !== id);
            }
            const label = document.getElementById(`feat-label-${id}`);
            label.style.background = checked ? '#E8F5F2' : '#F8FAFF';
            label.style.border = `1.5px solid ${checked ? 'var(--teal)' : 'var(--border)'}`;
        }
        async function saveFeatured() {
            try {
                const res = await fetch(`${API_BASE}/admin/homepage/featured`, { method: 'POST', headers: authHeaders(), body: JSON.stringify({ ids: HP_STATE.featured }) });
                const json = await res.json();
                toast(json.success ? `${t('ok_hp_feat')} (${HP_STATE.featured.length} schools)` : json.message || 'Error', json.success ? 'ok' : 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        /* ═══════════════════════════════════════
           END HOMEPAGE MANAGEMENT
           ═══════════════════════════════════════ */
        function doLogout() {
            localStorage.removeItem('sf_token');
            localStorage.removeItem('sf_user');
            window.location.href = '/login';
        }

        /* ═══════════════════════════════════════
           TOAST
           ═══════════════════════════════════════ */
        let ttimer;
        function toast(msg, type = 'inf') {
            const el = document.getElementById('toast');
            el.textContent = msg; el.className = `toast show ${type}`;
            clearTimeout(ttimer);
            ttimer = setTimeout(() => el.className = 'toast', 2600);
        }

        /* ═══════════════════════════════════════
           INIT
           ═══════════════════════════════════════ */
        // Load admin name if logged in
        const sfUser = JSON.parse(localStorage.getItem('sf_user') || 'null');
        if (sfUser) document.getElementById('admin-name').textContent = sfUser.name || 'A'
        if (sfUser) document.getElementById('admin-name').textContent = sfUser.name || 'Admin User';

        applyTR();
        renderActivity();

        if (window.innerWidth <= 900) document.getElementById('menu-btn').style.display = 'flex';
        window.addEventListener('resize', () => {
            document.getElementById('menu-btn').style.display = window.innerWidth <= 900 ? 'flex' : 'none';
        });
    </script>
@endpush
