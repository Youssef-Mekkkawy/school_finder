/* ═══════════════════════════════
   TRANSLATIONS — uses window.LANG set by PHP
   ═══════════════════════════════ */
const t = (key) => {
    const keys = key.split(".");
    let val = window.LANG;
    for (const k of keys) {
        if (val && val[k] !== undefined) val = val[k];
        else return key;
    }
    return typeof val === "string" ? val : key;
};

/* ═══════════════════════════════
   STATE
   ═══════════════════════════════ */
let lang = window.APP_LOCALE || "en";
let activeTab = "login";
let selectedRole = "user";

/* ═══════════════════════════════
   LANGUAGE — apply translations on load
   ═══════════════════════════════ */
function applyTR() {
    const set = (id, key) => {
        const el = document.getElementById(id);
        if (el) el.textContent = t(key);
    };
    const setHtml = (id, key) => {
        const el = document.getElementById(id);
        if (el) el.innerHTML = t(key);
    };
    setHtml("pb-txt", "login.trusted");
    setHtml("pl-title", "login.welcome");
    set("pl-sub", "login.sub");
    set("f1", "login.f1");
    set("f2", "login.f2");
    set("f3", "login.f3");
    set("f4", "login.f4");
    set("form-title", "login.welcome_back");
    set("form-sub", "login.sign_in_sub");
    set("tab-login", "login.tab_login");
    set("tab-register", "login.tab_register");
    set("role-lbl", "login.login_as");
    set("rn-user", "login.parent");
    set("rd-user", "login.parent_sub");
    set("rn-admin", "login.admin");
    set("rd-admin", "login.admin_sub");
    set("lbl-email", "login.email");
    set("lbl-pass", "login.password");
    set("lbl-rem", "login.remember");
    set("lnk-forgot", "login.forgot");
    set("login-btn-txt", "login.sign_in");
    set("sw-login-txt", "login.no_account");
    set("sw-login-lnk", "login.reg_free");
    set("lbl-name", "login.full_name");
    set("lbl-remail", "login.email");
    set("lbl-phone", "login.phone");
    set("lbl-rpass", "login.password");
    set("lbl-cpass", "login.confirm_pass");
    set("lbl-lang-pref", "login.lang_pref");
    set("lbl-terms", "login.terms");
    set("reg-btn-txt", "login.create_acc");
    set("sw-reg-txt", "login.have_acc");
    set("sw-reg-lnk", "login.sign_here");
    set("fg-title", "login.forgot_title");
    set("fg-sub", "login.forgot_sub");
    set("fg-lbl", "login.email");
    set("fg-btn-txt", "login.send_reset");
    set("fg-back", "login.back_login");
    set("nav-back", "login.nav_back");
}

/* ═══════════════════════════════
   TABS
   ═══════════════════════════════ */
function switchTab(tab) {
    activeTab = tab;
    document.getElementById("loginForm").style.display =
        tab === "login" ? "block" : "none";
    document.getElementById("registerForm").style.display =
        tab === "register" ? "block" : "none";
    document.getElementById("forgotForm").style.display =
        tab === "forgot" ? "block" : "none";
    document
        .getElementById("tab-login")
        .classList.toggle("act", tab === "login");
    document
        .getElementById("tab-register")
        .classList.toggle("act", tab === "register");
    document
        .getElementById("tabs-row")
        ?.classList.toggle("hidden", tab === "forgot");
    hideAlert();
    if (tab === "login") {
        document.getElementById("form-title").textContent =
            t("login.welcome_back");
        document.getElementById("form-sub").textContent =
            t("login.sign_in_sub");
    } else if (tab === "register") {
        document.getElementById("form-title").textContent =
            t("login.create_title");
        document.getElementById("form-sub").textContent = t("login.join_free");
    }
}

/* ═══════════════════════════════
   ROLE
   ═══════════════════════════════ */
function selectRole(r) {
    selectedRole = r;
    document.getElementById("role-user").classList.toggle("sel", r === "user");
    document
        .getElementById("role-admin")
        .classList.toggle("sel", r === "admin");
}

/* ═══════════════════════════════
   VALIDATION HELPERS
   ═══════════════════════════════ */
function showFieldErr(input, msgId, msg) {
    input.classList.add("err-field");
    input.classList.remove("ok-field");
    const el = document.getElementById(msgId);
    if (el) {
        el.textContent = msg;
        el.className = "field-msg err";
    }
}
function showFieldOk(input, msgId) {
    input.classList.remove("err-field");
    input.classList.add("ok-field");
    const el = document.getElementById(msgId);
    if (el) {
        el.textContent = "✓";
        el.className = "field-msg ok";
    }
}
function clearFieldErr(input) {
    input.classList.remove("err-field", "ok-field");
    const map = {
        loginPass: "pass-msg",
        regPass: "rpass-msg",
        regConf: "conf-msg",
    };
    const el = document.getElementById(map[input.id]);
    if (el) {
        el.textContent = "";
        el.className = "field-msg";
    }
}
function validateEmail(input) {
    const v = input.value.trim();
    const msgId = input.id === "loginEmail" ? "email-msg" : "remail-msg";
    if (!v) {
        clearFieldErr(input);
        return;
    }
    const ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    ok
        ? showFieldOk(input, msgId)
        : showFieldErr(input, msgId, t("errors.email"));
}
function validateName(input) {
    const v = input.value.trim();
    if (!v) {
        clearFieldErr(input);
        return;
    }
    v.length >= 2
        ? showFieldOk(input, "name-msg")
        : showFieldErr(input, "name-msg", t("errors.name"));
}
function checkMatch(input) {
    const pass = document.getElementById("regPass").value;
    if (!input.value) {
        clearFieldErr(input);
        return;
    }
    input.value === pass
        ? showFieldOk(input, "conf-msg")
        : showFieldErr(input, "conf-msg", t("errors.match"));
}

/* ═══════════════════════════════
   PASSWORD STRENGTH
   ═══════════════════════════════ */
function checkStrength(input) {
    const v = input.value;
    let score = 0;
    if (v.length >= 8) score++;
    if (/[A-Z]/.test(v)) score++;
    if (/[0-9]/.test(v)) score++;
    if (/[^A-Za-z0-9]/.test(v)) score++;
    const bars = [1, 2, 3, 4].map((i) => document.getElementById("sb" + i));
    const cls = score <= 1 ? "weak" : score === 2 ? "med" : "strong";
    const labels = [
        t("login.str_weak"),
        t("login.str_weak"),
        t("login.str_med"),
        t("login.str_strong"),
        t("login.str_vstrong"),
    ];
    const colors = { weak: "#e74c3c", med: "#f39c12", strong: "var(--ok)" };
    bars.forEach((b, i) => {
        b.className = "sb";
        if (i < score) b.classList.add(cls);
    });
    const txt = document.getElementById("str-txt");
    txt.textContent = v.length ? labels[score] : "";
    txt.style.color = colors[cls] || "var(--ok)";
}

/* ═══════════════════════════════
   EYE TOGGLE
   ═══════════════════════════════ */
function toggleEye(inputId, btn) {
    const input = document.getElementById(inputId);
    const show = input.type === "password";
    input.type = show ? "text" : "password";
    btn.innerHTML = show
        ? `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
        : `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
}

/* ═══════════════════════════════
   ALERT
   ═══════════════════════════════ */
function showAlert(msg, type = "err") {
    const el = document.getElementById("alert");
    document.getElementById("alert-msg").textContent = msg;
    el.className = `alert show ${type === "err" ? "err-a" : "ok-a"}`;
}
function hideAlert() {
    document.getElementById("alert").className = "alert";
}

/* ═══════════════════════════════
   SUBMIT LOGIN          ← CHANGED
   ═══════════════════════════════ */
async function submitLogin(e) {
    e.preventDefault();
    hideAlert();
    const email = document.getElementById("loginEmail").value.trim();
    const pass = document.getElementById("loginPass").value;
    if (!email || !pass) {
        showAlert(t("errors.fields"));
        return;
    }

    const btn = document.getElementById("login-btn");
    btn.classList.add("loading");
    btn.disabled = true;

    try {
        const endpoint =
            selectedRole === "admin"
                ? window.ROUTES.adminLogin
                : window.ROUTES.login;

        const res = await fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({ email, password: pass }),
        });
        const json = await res.json();

        if (res.ok && json.success) {
            localStorage.setItem("sf_token", json.data.token);
            localStorage.setItem(
                "sf_user",
                JSON.stringify({
                    id: json.data.user.id,
                    name: json.data.user.name,
                    email: json.data.user.email,
                    role: json.data.user.role,
                }),
            );
            showAlert(t("success.login"), "ok");
            toast(t("success.login"), "ok");
            const redirect =
                selectedRole === "admin"
                    ? window.ROUTES.adminDashboard
                    : window.ROUTES.dashboard;
            setTimeout(() => {
                window.location.href = redirect;
            }, 1200);
        } else {
            const msg =
                json.message ||
                (selectedRole === "admin"
                    ? t("errors.admin_login")
                    : t("errors.login"));
            showAlert(msg);
            document.getElementById("loginPass").classList.add("err-field");
        }
    } catch (err) {
        showAlert("Network error — please try again.");
    } finally {
        btn.classList.remove("loading");
        btn.disabled = false;
    }
}

/* ═══════════════════════════════
   SUBMIT REGISTER       ← CHANGED
   ═══════════════════════════════ */
async function submitRegister(e) {
    e.preventDefault();
    hideAlert();
    const name = document.getElementById("regName").value.trim();
    const email = document.getElementById("regEmail").value.trim();
    const pass = document.getElementById("regPass").value;
    const conf = document.getElementById("regConf").value;
    const agree = document.getElementById("agreeTerms").checked;

    if (!name || !email || !pass || !conf) {
        showAlert(t("errors.fields"));
        return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showAlert(t("errors.email"));
        return;
    }
    if (pass.length < 8) {
        showAlert(t("errors.password"));
        return;
    }
    if (pass !== conf) {
        showAlert(t("errors.match"));
        return;
    }
    if (!agree) {
        showAlert(t("errors.terms"));
        return;
    }

    const btn = document.getElementById("reg-btn");
    btn.classList.add("loading");
    btn.disabled = true;

    try {
        const res = await fetch(window.ROUTES.register, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({
                name,
                email,
                password: pass,
                password_confirmation: conf,
            }),
        });
        const json = await res.json();

        if (res.ok && json.success) {
            localStorage.setItem("sf_token", json.data.token);
            localStorage.setItem(
                "sf_user",
                JSON.stringify({
                    id: json.data.user.id,
                    name: json.data.user.name,
                    email: json.data.user.email,
                    role: "user",
                }),
            );
            showAlert(t("success.register"), "ok");
            toast(t("success.register"), "ok");
            setTimeout(() => {
                window.location.href = window.ROUTES.dashboard;
            }, 1300);
        } else {
            const msg =
                json.message ||
                (json.errors
                    ? Object.values(json.errors)[0][0]
                    : t("errors.fields"));
            showAlert(msg);
        }
    } catch (err) {
        showAlert("Network error — please try again.");
    } finally {
        btn.classList.remove("loading");
        btn.disabled = false;
    }
}

/* ═══════════════════════════════
   SUBMIT FORGOT
   ═══════════════════════════════ */
function showForgot() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("forgotForm").style.display = "block";
    document.getElementById("tab-login").classList.remove("act");
    document.getElementById("tab-register").classList.remove("act");
}
function submitForgot(e) {
    e.preventDefault();
    const email = document.getElementById("forgotEmail").value.trim();
    if (!email) {
        showAlert(t("errors.fields"));
        return;
    }
    const btn = e.target.querySelector(".sub-btn");
    btn.classList.add("loading");
    btn.disabled = true;
    setTimeout(() => {
        btn.classList.remove("loading");
        btn.disabled = false;
        showAlert(t("success.forgot"), "ok");
        toast(t("success.forgot"), "ok");
    }, 900);
}

/* ═══════════════════════════════
   TOAST
   ═══════════════════════════════ */
let ttimer;
function toast(msg, type = "inf") {
    const el = document.getElementById("toast");
    el.textContent = msg;
    el.className = `toast show ${type}`;
    clearTimeout(ttimer);
    ttimer = setTimeout(() => (el.className = "toast"), 2600);
}

/* ═══════════════════════════════
   INIT                   ← CHANGED
   ═══════════════════════════════ */
const sfUser = JSON.parse(localStorage.getItem("sf_user") || "null");
if (sfUser && sfUser.role) {
    const redirect =
        sfUser.role === "admin"
            ? window.ROUTES.adminDashboard
            : window.ROUTES.dashboard;
    window.location.replace(redirect);
}
applyTR();
