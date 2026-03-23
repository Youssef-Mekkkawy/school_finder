    <!-- ══ OVERVIEW ══ -->
    <div id="tab-overview">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-title">Welcome back, Omar 👋</h3>
          <span class="sec-tag" id="ov-tag">Overview</span>
        </div>
        <div class="overview-grid">
          <div class="ov-card" onclick="showTab('favorites',document.getElementById('si-favorites'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#E8F5F2">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--teal)" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <div><div class="ov-val" id="ov-fav-n">5</div><div class="ov-lbl" id="ov-fav-l">Saved Schools</div></div>
          </div>
          <div class="ov-card" onclick="showTab('reviews',document.getElementById('si-reviews'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#FEF3E2">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--warn)" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div><div class="ov-val" id="ov-rev-n">2</div><div class="ov-lbl" id="ov-rev-l">Reviews Written</div></div>
          </div>
          <div class="ov-card" onclick="showTab('appointments',document.getElementById('si-appointments'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#EBF5FB">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3498db" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div><div class="ov-val" id="ov-appt-n">3</div><div class="ov-lbl" id="ov-appt-l">Appointments</div></div>
          </div>
        </div>
      </div>

      <!-- Recent favorites -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-recent-title">Recently Saved</h3>
          <button class="btn-sm btn-outline" onclick="showTab('favorites',document.getElementById('si-favorites'))" id="ov-view-all">View All →</button>
        </div>
        <div class="fav-grid" id="recent-favs-grid"></div>
      </div>

      <!-- Upcoming Appointments -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-appts-title">Upcoming Appointments</h3>
          <button class="btn-sm btn-outline" onclick="showTab('appointments',document.getElementById('si-appointments'))" id="ov-view-appts">View All →</button>
        </div>
        <div id="upcoming-appts"></div>
      </div>
    </div>
