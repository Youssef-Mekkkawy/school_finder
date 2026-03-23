    <!-- ══ NOTIFICATIONS ══ -->
    <div id="tab-notifications" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="notif-page-title">Notifications</h3>
          <button class="btn-sm btn-outline" onclick="markAllRead()" id="mark-all-btn">Mark all as read</button>
        </div>
        <div id="notifs-list"></div>
        <div class="empty" id="notifs-empty" style="display:none">
          <div class="empty-icon">🔔</div>
          <h4 id="notifs-empty-title">No notifications</h4>
          <p style="font-size:.83rem" id="notifs-empty-sub">You're all caught up!</p>
        </div>
      </div>
    </div>
