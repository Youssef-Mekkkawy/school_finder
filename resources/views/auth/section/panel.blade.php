<!-- LEFT PANEL -->
<div class="panel-left">
    <div class="panel-left-inner">
        <div class="panel-badge">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <span id="pb-txt">Trusted by Parents in Cairo</span>
        </div>
        <h2 id="pl-title">Welcome to <span>SchoolFinder</span> Egypt</h2>
        <p id="pl-sub">Your account gives you access to favorites, reviews, appointment booking, and school
            comparison tools.</p>
        <div class="feature-list">
            <div class="feature">
                <div class="feature-dot">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#52d9bd" stroke-width="2.5">
                        <path d="M20 6L9 17l-5-5" />
                    </svg>
                </div>
                <span id="f1">Save favorite schools and compare them</span>
            </div>
            <div class="feature">
                <div class="feature-dot">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#52d9bd" stroke-width="2.5">
                        <path d="M20 6L9 17l-5-5" />
                    </svg>
                </div>
                <span id="f2">Write and read honest parent reviews</span>
            </div>
            <div class="feature">
                <div class="feature-dot">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#52d9bd" stroke-width="2.5">
                        <path d="M20 6L9 17l-5-5" />
                    </svg>
                </div>
                <span id="f3">Book school visits directly from the app</span>
            </div>
            <div class="feature">
                <div class="feature-dot">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#52d9bd" stroke-width="2.5">
                        <path d="M20 6L9 17l-5-5" />
                    </svg>
                </div>
                <span id="f4">Get notified when school fees are updated</span>
            </div>
        </div>
    </div>
    <div class="panel-stats">
        <div class="pstat">
            <div class="pstat-n">105+</div>
            <div class="pstat-l" id="ps1">Schools</div>
        </div>
        <div class="pstat">
            <div class="pstat-n">500+</div>
            <div class="pstat-l" id="ps2">Reviews</div>
        </div>
        <div class="pstat">
            <div class="pstat-n">Free</div>
            <div class="pstat-l" id="ps3">Always</div>
        </div>
    </div>
</div>

<!-- RIGHT PANEL -->
<div class="panel-right">

    <div class="form-header">
        <h3 id="form-title">Welcome back</h3>
        <p id="form-sub">Sign in to your SchoolFinder account</p>
    </div>

    <!-- TABS -->
    <div class="tabs">
        <button class="tab act" id="tab-login" onclick="switchTab('login')">Login</button>
        <button class="tab" id="tab-register" onclick="switchTab('register')">Register</button>
    </div>

    <!-- ALERT -->
    <div class="alert" id="alert">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" />
            <path d="M12 8v4M12 16h.01" />
        </svg>
        <span id="alert-msg"></span>
    </div>

    <!-- ── LOGIN FORM ── -->
    <form id="loginForm" onsubmit="submitLogin(event)" novalidate>
        <!-- Role Selector (shows on login too for demo) -->
        <div style="margin-bottom:1.1rem">
            <label style="display:block;font-size:.82rem;font-weight:600;color:var(--navy);margin-bottom:.5rem"
                id="role-lbl">Login as</label>
            <div class="role-grid">
                <div class="role-card sel" id="role-user" onclick="selectRole('user')">
                    <div class="role-icon" style="background:#E8F5F2">👨‍👩‍👧</div>
                    <div>
                        <div class="role-name" id="rn-user">Parent / Student</div>
                        <div class="role-desc" id="rd-user">Browse & compare schools</div>
                    </div>
                </div>
                <div class="role-card" id="role-admin" onclick="selectRole('admin')">
                    <div class="role-icon" style="background:#EEF2FF">🛡️</div>
                    <div>
                        <div class="role-name" id="rn-admin">Admin</div>
                        <div class="role-desc" id="rd-admin">Manage platform data</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="field">
            <label id="lbl-email">Email Address</label>
            <div class="field-wrap">
                <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,12 2,6" />
                </svg>
                <input type="email" name="email" id="loginEmail" placeholder="your@email.com" oninput="validateEmail(this)">
            </div>
            <div class="field-msg" id="email-msg"></div>
        </div>

        <!-- Password -->
        <div class="field">
            <label id="lbl-pass">Password</label>
            <div class="field-wrap">
                <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                <input type="password" name="password" id="loginPass" placeholder="••••••••" oninput="clearFieldErr(this)">
                <button type="button" class="eye-btn" onclick="toggleEye('loginPass',this)">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>
            <div class="field-msg" id="pass-msg"></div>
        </div>

        <!-- Remember + Forgot -->
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
            <div class="check-row" style="margin-bottom:0">
                <input type="checkbox" id="remember">
                <label for="remember" id="lbl-rem">Remember me</label>
            </div>
            <div class="forgot"><a href="#" onclick="showForgot();return false;" id="lnk-forgot">Forgot
                    password?</a></div>
        </div>

        <button type="submit" class="sub-btn" id="login-btn">
            <span class="btn-txt" id="login-btn-txt">Sign In →</span>
            <div class="spinner"></div>
        </button>

        <div class="switch" style="margin-top:1rem">
            <span id="sw-login-txt">Don't have an account?</span>
            <a onclick="switchTab('register')" id="sw-login-lnk"> Register for free</a>
        </div>
    </form>

    <!-- ── REGISTER FORM ── -->
    @include('auth.section.registerForm')

    <!-- FORGOT PASSWORD FORM -->
    @include('auth.section.forgotForm')
</div><!-- end panel-right -->
