/**
 * SchoolFinder Egypt — Shared UI Helpers
 * Toast, language toggle base, and common utilities.
 */

// ── TOAST ─────────────────────────────────────────────────────
let _toastTimer;

/**
 * Show a toast notification
 * @param {string} msg  - Message to display
 * @param {string} type - 'ok' | 'err' | 'inf'
 */
function toast(msg, type = "inf") {
    const el = document.getElementById("toast");
    if (!el) return;
    el.textContent = msg;
    el.className = `toast show ${type}`;
    clearTimeout(_toastTimer);
    _toastTimer = setTimeout(() => {
        el.className = "toast";
    }, 2600);
}

// ── LANGUAGE ──────────────────────────────────────────────────

/**
 * Apply a translation object to the DOM
 * Finds elements by ID and sets their textContent
 * @param {object} translations - key: elementId, value: text
 * @param {string[]} skip       - keys to skip (e.g. err_ ok_ prefixes)
 */
function applyTranslations(translations, skip = []) {
    Object.keys(translations).forEach((k) => {
        if (skip.some((prefix) => k.startsWith(prefix))) return;
        const el = document.getElementById(k);
        if (el) el.textContent = translations[k];
    });
}

/**
 * Toggle RTL/LTR direction on the document
 * @param {string} lang - 'ar' | 'en'
 */
function setDirection(lang) {
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
    const lbl = document.getElementById("lang-lbl");
    if (lbl) lbl.textContent = lang === "ar" ? "AR" : "EN";
}

// ── PASSWORD EYE TOGGLE ───────────────────────────────────────
function toggleEye(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const show = input.type === "password";
    input.type = show ? "text" : "password";
    btn.innerHTML = show
        ? `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
        : `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
}

// ── AUTH GUARDS ───────────────────────────────────────────────

/**
 * User auth guard — call at top of user dashboard
 * Redirects to /login if no token found
 */
function guardUser() {
    const token = localStorage.getItem("sf_token");
    if (!token) {
        document.body.style.visibility = "hidden";
        window.location.replace("/login");
        return false;
    }
    return true;
}

/**
 * Admin auth guard — call at top of admin dashboard
 * Redirects to /login if no token or not admin role
 */
function guardAdmin() {
    const token = localStorage.getItem("sf_token");
    const user = JSON.parse(localStorage.getItem("sf_user") || "{}");
    if (!token || user.role !== "admin") {
        document.body.style.visibility = "hidden";
        window.location.replace("/login");
        return false;
    }
    return true;
}

// Make available globally
window.toast = toast;
window.applyTranslations = applyTranslations;
window.setDirection = setDirection;
window.toggleEye = toggleEye;
window.guardUser = guardUser;
window.guardAdmin = guardAdmin;

/* ═══════════════════════════════════════
   GLOBAL MODAL SYSTEM
   Replaces all alert(), confirm(), prompt()
   ═══════════════════════════════════════ */

let _sfModalResolve = null;

function sfShowModal({ icon='', title, message, fields=[], buttons=[] }) {
    document.getElementById('sf-modal-icon').textContent    = icon;
    document.getElementById('sf-modal-title').textContent   = title;
    document.getElementById('sf-modal-message').textContent = message;

    const fieldsEl = document.getElementById('sf-modal-fields');
    fieldsEl.innerHTML = fields.map(f => `
        <div style="margin-bottom:.8rem">
            <label style="display:block;font-size:.8rem;font-weight:600;color:var(--navy);margin-bottom:.38rem;font-family:'Sora',sans-serif;">${f.label}${f.required ? ' *' : ''}</label>
            ${f.type === 'textarea'
                ? `<textarea id="sf-field-${f.key}" placeholder="${f.placeholder || ''}" rows="3" style="width:100%;border:1.5px solid var(--border);border-radius:9px;padding:.62rem .88rem;font-family:'DM Sans',sans-serif;font-size:.88rem;color:var(--text);outline:none;resize:none;transition:border-color .2s;box-sizing:border-box;" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--border)'">${f.value || ''}</textarea>`
                : `<input id="sf-field-${f.key}" type="${f.type || 'text'}" placeholder="${f.placeholder || ''}" value="${f.value || ''}" style="width:100%;border:1.5px solid var(--border);border-radius:9px;padding:.62rem .88rem;font-family:'DM Sans',sans-serif;font-size:.88rem;color:var(--text);outline:none;transition:border-color .2s;box-sizing:border-box;" onfocus="this.style.borderColor='var(--teal)'" onblur="this.style.borderColor='var(--border)'" />`
            }
        </div>
    `).join('');

    const buttonsEl = document.getElementById('sf-modal-buttons');
    buttonsEl.innerHTML = buttons.map(b => `
        <button onclick="sfModalAction('${b.action}')" style="padding:.52rem 1.2rem;border-radius:8px;border:none;font-family:'Sora',sans-serif;font-weight:600;font-size:.84rem;cursor:pointer;transition:all .2s;${b.style === 'primary' ? 'background:var(--teal);color:white;' : b.style === 'danger' ? 'background:var(--err);color:white;' : 'background:var(--light);color:var(--navy);border:1.5px solid var(--border);'}">${b.label}</button>
    `).join('');

    document.getElementById('sf-modal-overlay').style.display = 'flex';
    return new Promise(resolve => { _sfModalResolve = resolve; });
}

function sfModalAction(action) {
    const resolve = _sfModalResolve;
    if (action === 'cancel') {
        sfCloseModal();
        if (resolve) resolve({ action: 'cancel', values: {} });
        return;
    }
    const values = {};
    document.querySelectorAll('[id^="sf-field-"]').forEach(el => {
        values[el.id.replace('sf-field-', '')] = el.value.trim();
    });
    sfCloseModal();
    if (resolve) resolve({ action, values });
}

function sfCloseModal() {
    document.getElementById('sf-modal-overlay').style.display = 'none';
    _sfModalResolve = null;
}

function sfModalOverlayClick(e) {
    if (e.target === document.getElementById('sf-modal-overlay')) {
        const resolve = _sfModalResolve;
        sfCloseModal();
        if (resolve) resolve({ action: 'cancel', values: {} });
    }
}

function sfAlert(message, title='Notice', icon='ℹ️') {
    return sfShowModal({ icon, title, message, buttons: [{ label:'OK', action:'ok', style:'primary' }] });
}

function sfConfirm(message, title='Are you sure?', icon='⚠️', danger=false) {
    return sfShowModal({ icon, title, message, buttons: [
        { label:'Cancel', action:'cancel', style:'ghost' },
        { label:'Confirm', action:'confirm', style: danger ? 'danger' : 'primary' },
    ]});
}

function sfPrompt(message, label, title='Enter Details', placeholder='', type='text', icon='✏️') {
    return sfShowModal({ icon, title, message, fields: [{ key:'value', label, placeholder, type }], buttons: [
        { label:'Cancel', action:'cancel', style:'ghost' },
        { label:'Submit', action:'submit', style:'primary' },
    ]});
}

function sfForm(title, message, fields, icon='✏️', confirmLabel='Save') {
    return sfShowModal({ icon, title, message, fields, buttons: [
        { label:'Cancel', action:'cancel', style:'ghost' },
        { label:confirmLabel, action:'submit', style:'primary' },
    ]});
}

function sfDelete(itemName) {
    return sfShowModal({ icon:'🗑️', title:`Delete ${itemName}?`, message:'This action cannot be undone.', buttons: [
        { label:'Cancel', action:'cancel', style:'ghost' },
        { label:'Delete', action:'confirm', style:'danger' },
    ]});
}
