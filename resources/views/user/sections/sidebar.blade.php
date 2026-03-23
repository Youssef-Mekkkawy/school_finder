<!-- SIDEBAR -->
<div class="sidebar">

  <!-- User Card -->
  <div class="user-card">
    <div class="avatar" id="user-avatar">O</div>
    <div class="user-name" id="user-name">Omar Ahmed</div>
    <div class="user-email" id="user-email">omar@test.com</div>
    <div class="user-since" id="user-since">Member since January 2026</div>
    <div class="user-stats">
      <div class="ustat"><div class="ustat-n" id="us-favs">5</div><div class="ustat-l" id="us-favs-lbl">Favorites</div></div>
      <div class="ustat"><div class="ustat-n" id="us-revs">2</div><div class="ustat-l" id="us-revs-lbl">Reviews</div></div>
      <div class="ustat"><div class="ustat-n" id="us-appts">3</div><div class="ustat-l" id="us-appts-lbl">Appts</div></div>
    </div>
  </div>

  <!-- Nav -->
  <div class="sb-nav">
    <div class="sb-item act" onclick="showTab('overview',this)" id="si-overview">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      <span id="sl-overview">Overview</span>
    </div>
    <div class="sb-item" onclick="showTab('favorites',this)" id="si-favorites">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      <span id="sl-favorites">Favorites</span>
      <span class="sb-badge" id="fav-badge">5</span>
    </div>
    <div class="sb-item" onclick="showTab('reviews',this)" id="si-reviews">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      <span id="sl-reviews">My Reviews</span>
    </div>
    <div class="sb-item" onclick="showTab('appointments',this)" id="si-appointments">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      <span id="sl-appointments">Appointments</span>
      <span class="sb-badge" id="appt-badge" style="background:var(--warn)">2</span>
    </div>
    <div class="sb-item" onclick="showTab('notifications',this)" id="si-notifications">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
      <span id="sl-notifications">Notifications</span>
      <span class="sb-badge" id="notif-badge">2</span>
    </div>
    <div class="sb-item" onclick="showTab('profile',this)" id="si-profile">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      <span id="sl-profile">Edit Profile</span>
    </div>
  </div>

</div>
