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
    if (action === 'cancel') {
        sfCloseModal();
        if (_sfModalResolve) _sfModalResolve({ action: 'cancel', values: {} });
        return;
    }
    const values = {};
    document.querySelectorAll('[id^="sf-field-"]').forEach(el => {
        values[el.id.replace('sf-field-', '')] = el.value.trim();
    });
    sfCloseModal();
    if (_sfModalResolve) _sfModalResolve({ action, values });
}

function sfCloseModal() {
    document.getElementById('sf-modal-overlay').style.display = 'none';
    _sfModalResolve = null;
}

function sfModalOverlayClick(e) {
    if (e.target === document.getElementById('sf-modal-overlay')) {
        sfCloseModal();
        if (_sfModalResolve) _sfModalResolve({ action: 'cancel', values: {} });
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
