<!-- ── REGISTER FORM ── -->
<form id="registerForm" style="display:none" onsubmit="submitRegister(event)" novalidate>

    <!-- Full Name -->
    <div class="field">
        <label id="lbl-name">Full Name</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <input type="text" id="regName" placeholder="Omar Ahmed" oninput="validateName(this)">
        </div>
        <div class="field-msg" id="name-msg"></div>
    </div>

    <!-- Email -->
    <div class="field">
        <label id="lbl-remail">Email Address</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,12 2,6" />
            </svg>
            <input type="email" id="regEmail" placeholder="your@email.com" oninput="validateEmail(this)">
        </div>
        <div class="field-msg" id="remail-msg"></div>
    </div>

    <!-- Phone -->
    <div class="field">
        <label id="lbl-phone">Phone Number <span style="color:var(--muted);font-weight:400">(optional)</span></label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.16 6.16l1.09-1.09a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
            </svg>
            <input type="tel" id="regPhone" placeholder="+20 1XX XXX XXXX">
        </div>
    </div>

    <!-- Password -->
    <div class="field">
        <label id="lbl-rpass">Password</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </svg>
            <input type="password" id="regPass" placeholder="Min. 8 characters" oninput="checkStrength(this)">
            <button type="button" class="eye-btn" onclick="toggleEye('regPass',this)">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </button>
        </div>
        <div class="strength-bar">
            <div class="sb" id="sb1"></div>
            <div class="sb" id="sb2"></div>
            <div class="sb" id="sb3"></div>
            <div class="sb" id="sb4"></div>
        </div>
        <div class="strength-txt" id="str-txt" style="color:var(--muted)"></div>
    </div>

    <!-- Confirm Password -->
    <div class="field">
        <label id="lbl-cpass">Confirm Password</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </svg>
            <input type="password" id="regConf" placeholder="Repeat password" oninput="checkMatch(this)">
            <button type="button" class="eye-btn" onclick="toggleEye('regConf',this)">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </button>
        </div>
        <div class="field-msg" id="conf-msg"></div>
    </div>

    <!-- Language Preference -->
    <div class="field">
        <label id="lbl-lang-pref">Preferred Language</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
            </svg>
            <select id="regLang" style="padding-left:2.6rem">
                <option value="en">English</option>
                <option value="ar">العربية (Arabic)</option>
            </select>
        </div>
    </div>

    <!-- Terms -->
    <div class="check-row" style="margin-bottom:1rem;align-items:flex-start">
        <input type="checkbox" id="agreeTerms" style="margin-top:.2rem">
        <label for="agreeTerms" id="lbl-terms" style="font-size:.8rem;color:var(--muted);line-height:1.5">I agree to the
            <a href="#" style="color:var(--teal);text-decoration:none">Terms of Service</a> and <a href="#"
                style="color:var(--teal);text-decoration:none">Privacy Policy</a></label>
    </div>

    <button type="submit" class="sub-btn" id="reg-btn">
        <span class="btn-txt" id="reg-btn-txt">Create Account →</span>
        <div class="spinner"></div>
    </button>

    <div class="switch" style="margin-top:1rem">
        <span id="sw-reg-txt">Already have an account?</span>
        <a onclick="switchTab('login')" id="sw-reg-lnk"> Sign in here</a>
    </div>
</form>
