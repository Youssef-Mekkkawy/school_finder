<!-- FORGOT PASSWORD FORM -->
<form id="forgotForm" style="display:none" onsubmit="submitForgot(event)" novalidate>
    <div style="text-align:center;margin-bottom:1.5rem">
        <div
            style="width:52px;height:52px;background:#E8F5F2;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto .8rem">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--teal)" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,12 2,6" />
            </svg>
        </div>
        <h4 id="fg-title"
            style="font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:var(--navy);margin-bottom:.3rem">
            Forgot Password?</h4>
        <p id="fg-sub" style="font-size:.85rem;color:var(--muted)">Enter your email and we'll send you a
            reset link.</p>
    </div>
    <div class="field">
        <label id="fg-lbl">Email Address</label>
        <div class="field-wrap">
            <svg class="field-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,12 2,6" />
            </svg>
            <input type="email" id="forgotEmail" placeholder="your@email.com">
        </div>
    </div>
    <button type="submit" class="sub-btn">
        <span class="btn-txt" id="fg-btn-txt">Send Reset Link →</span>
        <div class="spinner"></div>
    </button>
    <div style="text-align:center;margin-top:1rem">
        <a onclick="switchTab('login')" style="font-size:.83rem;color:var(--teal);cursor:pointer;font-weight:500"
            id="fg-back">←
            Back to Login</a>
    </div>
</form>
