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
        <div class="sb-item" onclick="window.location.href='/'" id="si-site">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <line x1="2" y1="12" x2="22" y2="12" />
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
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
