    <!-- ══ PROFILE ══ -->
    <div id="tab-profile" style="display:none">

      <!-- Personal Info -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="prof-title">Personal Information</h3>
          <button class="btn-sm btn-teal" onclick="saveProfile()" id="save-prof-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17,21 17,13 7,13 7,21"/><polyline points="7,3 7,8 15,8"/></svg>
            <span id="save-prof-txt">Save Changes</span>
          </button>
        </div>
        <div class="prof-form">
          <div class="fi-2">
            <div class="field">
              <label id="lbl-name">Full Name</label>
              <input class="fi" type="text" id="prof-name" value="Omar Ahmed Gooda">
            </div>
            <div class="field">
              <label id="lbl-phone">Phone Number</label>
              <input class="fi" type="tel" id="prof-phone" placeholder="+20 1XX XXX XXXX">
            </div>
          </div>
          <div class="fi-2">
            <div class="field">
              <label id="lbl-email">Email Address</label>
              <input class="fi" type="email" id="prof-email" value="omar@test.com">
            </div>
            <div class="field">
              <label id="lbl-lang">Preferred Language</label>
              <select class="fi" id="prof-lang">
                <option value="en">English</option>
                <option value="ar">العربية (Arabic)</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <!-- Change Password -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="pass-title">Change Password</h3>
          <button class="btn-sm btn-teal" onclick="savePassword()" id="save-pass-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span id="save-pass-txt">Update Password</span>
          </button>
        </div>
        <div class="prof-form">
          <div class="fi-2">
            <div class="field">
              <label id="lbl-curr-pass">Current Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="curr-pass" placeholder="••••••••">
                <button class="eye-btn" type="button" onclick="toggleEye('curr-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
            <div></div>
            <div class="field">
              <label id="lbl-new-pass">New Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="new-pass" placeholder="Min. 8 characters">
                <button class="eye-btn" type="button" onclick="toggleEye('new-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
            <div class="field">
              <label id="lbl-conf-pass">Confirm New Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="conf-pass" placeholder="Repeat new password">
                <button class="eye-btn" type="button" onclick="toggleEye('conf-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Danger Zone -->
      <div class="sec-card" style="border-color:#FECACA">
        <div class="sec-head" style="border-color:#FECACA">
          <h3 style="color:var(--err)" id="danger-title">Danger Zone</h3>
        </div>
        <div style="padding:1.2rem 1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.8rem">
          <div>
            <div style="font-weight:600;font-size:.88rem;color:var(--navy)" id="del-acc-title">Delete Account</div>
            <div style="font-size:.8rem;color:var(--muted);margin-top:.15rem" id="del-acc-sub">Permanently delete your account and all your data</div>
          </div>
          <button class="btn-sm btn-red" onclick="confirmDeleteAccount()" id="del-acc-btn">Delete Account</button>
        </div>
      </div>

    </div><!-- end tab-profile -->
