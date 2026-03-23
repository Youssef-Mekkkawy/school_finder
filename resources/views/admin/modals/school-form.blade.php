<!-- ══ SCHOOL MODAL ══ -->
<div class="ov" id="schoolModal" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="modal wide">
        <div class="mh">
            <h3 id="school-modal-title">Add School</h3>
            <button class="mclose"
                onclick="document.getElementById('schoolModal').classList.remove('open')">✕</button>
        </div>
        <div class="mb">
            <input type="hidden" id="edit-school-id">
            <div class="fi-2">
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-name">School Name</label>
                    <input class="fi" type="text" id="fm-name-input" placeholder="Full school name">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-type">School Type</label>
                    <select class="fi" id="fm-type-input">
                        <option>British</option>
                        <option>American</option>
                        <option>German</option>
                        <option>French</option>
                        <option>Multinational</option>
                    </select>
                </div>
            </div>
            <div class="fi-2">
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-area">Area</label>
                    <input class="fi" type="text" id="fm-area-input" placeholder="e.g. New Cairo">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-loc">Location</label>
                    <select class="fi" id="fm-loc-input">
                        <option>New Cairo</option>
                        <option>Maadi</option>
                        <option>Sheikh Zayed</option>
                        <option>6th of October</option>
                        <option>El-Shorouk</option>
                        <option>Heliopolis</option>
                    </select>
                </div>
            </div>
            <div class="fi-3">
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-fee-min">Fee Min (EGP K)</label>
                    <input class="fi" type="number" id="fm-fee-min-input" placeholder="e.g. 150">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-fee-max">Fee Max (EGP K)</label>
                    <input class="fi" type="number" id="fm-fee-max-input" placeholder="e.g. 350">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-cur">Currency</label>
                    <select class="fi" id="fm-cur-input">
                        <option>EGP</option>
                        <option>USD</option>
                    </select>
                </div>
            </div>
            <div class="fi-2">
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-age">Age Range</label>
                    <input class="fi" type="text" id="fm-age-input" placeholder="e.g. 3 – 18">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-class">Class Size</label>
                    <input class="fi" type="number" id="fm-class-input" placeholder="e.g. 20">
                </div>
            </div>
            <div class="fi-2">
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-email">Email</label>
                    <input class="fi" type="email" id="fm-email-input" placeholder="school@email.com">
                </div>
                <div class="field" style="margin-bottom:.8rem">
                    <label id="fm-phone">Phone</label>
                    <input class="fi" type="text" id="fm-phone-input" placeholder="+20 X XXXX XXXX">
                </div>
            </div>
            <div class="field" style="margin-bottom:.8rem">
                <label id="fm-website">Website</label>
                <input class="fi" type="url" id="fm-website-input" placeholder="https://school.com">
            </div>
            <div class="field" style="margin-bottom:.8rem">
                <label id="fm-curricula">Curricula (comma separated)</label>
                <input class="fi" type="text" id="fm-curricula-input" placeholder="IGCSE, IB Diploma">
            </div>
            <div class="modal-actions">
                <button class="btn-sm btn-outline"
                    onclick="document.getElementById('schoolModal').classList.remove('open')"
                    id="fm-cancel">Cancel</button>
                <button class="btn-sm btn-teal" onclick="saveSchool()" id="fm-save">Save School</button>
            </div>
        </div>
    </div>
</div>
