    <!-- ══ APPOINTMENTS ══ -->
    <div id="tab-appointments" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="appt-page-title">My Appointments</h3>
          <button class="btn-sm btn-teal" onclick="window.location.href='/'" id="book-appt-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span id="book-appt-txt">Book New Appointment</span>
          </button>
        </div>
        <div id="appts-list"></div>
        <div class="empty" id="appts-empty" style="display:none">
          <div class="empty-icon">📅</div>
          <h4 id="appts-empty-title">No appointments yet</h4>
          <p style="font-size:.83rem;margin-bottom:.8rem" id="appts-empty-sub">Book a visit to a school from its profile page</p>
          <a href="/" id="appts-empty-link">Browse Schools →</a>
        </div>
      </div>
    </div>
