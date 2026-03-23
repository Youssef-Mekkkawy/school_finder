<div class="toast" id="toast"></div>

<!-- GLOBAL MODAL SYSTEM -->
<div id="sf-modal-overlay" onclick="sfModalOverlayClick(event)" style="position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:500;display:none;align-items:center;justify-content:center;padding:1rem;">
    <div id="sf-modal-box" style="background:white;border-radius:16px;width:100%;max-width:440px;box-shadow:0 30px 80px rgba(0,0,0,.25);overflow:hidden;">
        <div id="sf-modal-header" style="padding:1.2rem 1.5rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:.65rem">
                <div id="sf-modal-icon" style="font-size:1.3rem"></div>
                <h3 id="sf-modal-title" style="font-family:'Sora',sans-serif;font-weight:700;font-size:1rem;color:var(--navy);margin:0"></h3>
            </div>
            <button onclick="sfCloseModal()" style="width:28px;height:28px;border-radius:7px;border:1.5px solid var(--border);background:white;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.9rem;">✕</button>
        </div>
        <div style="padding:1.3rem 1.5rem">
            <p id="sf-modal-message" style="font-size:.9rem;color:var(--muted);line-height:1.6;margin-bottom:1rem;"></p>
            <div id="sf-modal-fields" style="margin-bottom:1rem"></div>
            <div id="sf-modal-buttons" style="display:flex;gap:.6rem;justify-content:flex-end;"></div>
        </div>
    </div>
</div>
