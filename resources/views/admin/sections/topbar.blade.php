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
        <button class="lang-btn" onclick="toggleLang()">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
            </svg>
            <span id="lang-lbl">EN</span>
        </button>
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
