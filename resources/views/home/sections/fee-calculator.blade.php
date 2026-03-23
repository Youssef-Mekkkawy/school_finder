<!-- FEE CALCULATOR -->
<section class="fee-calc-sec">
    <div class="si">
        <div style="text-align:center;margin-bottom:.35rem">
            <span class="sec-tag" id="fc-tag">Planning Tool</span>
            <h2 class="sec-title" style="text-align:center" id="fc-title">School Fee Calculator</h2>
            <p class="sec-sub" style="margin:0 auto;text-align:center" id="fc-sub">Estimate your annual school fees based on type, grade, and number of children.</p>
        </div>

        <div class="fc-card">
            <div class="fc-inputs">
                <!-- Children -->
                <div class="fc-field">
                    <label class="fc-label" id="fc-lbl-children">Number of Children</label>
                    <select class="fsel fc-sel" id="fc-children">
                        <option value="1">1 Child</option>
                        <option value="2">2 Children</option>
                        <option value="3">3 Children</option>
                        <option value="4">4+ Children</option>
                    </select>
                </div>
                <!-- School Type -->
                <div class="fc-field">
                    <label class="fc-label" id="fc-lbl-type">School Type</label>
                    <select class="fsel fc-sel" id="fc-type">
                        <option value="British" id="fc-opt-brit">British</option>
                        <option value="American" id="fc-opt-amer">American</option>
                        <option value="German" id="fc-opt-germ">German</option>
                        <option value="French" id="fc-opt-fren">French</option>
                    </select>
                </div>
                <!-- Grade Level -->
                <div class="fc-field">
                    <label class="fc-label" id="fc-lbl-grade">Grade Level</label>
                    <select class="fsel fc-sel" id="fc-grade">
                        <option value="KG" id="fc-opt-kg">KG</option>
                        <option value="Primary" id="fc-opt-pri">Primary</option>
                        <option value="Middle" id="fc-opt-mid">Middle School</option>
                        <option value="High" id="fc-opt-high">High School</option>
                    </select>
                </div>
                <!-- Transport -->
                <div class="fc-field">
                    <label class="fc-label" id="fc-lbl-transport">Transport Needed</label>
                    <select class="fsel fc-sel" id="fc-transport">
                        <option value="no" id="fc-opt-no">No</option>
                        <option value="yes" id="fc-opt-yes">Yes</option>
                    </select>
                </div>
            </div>

            <div style="text-align:center;margin-top:1.8rem">
                <button class="sbtn" onclick="calcFees()" id="fc-btn">Calculate Estimate</button>
            </div>

            <!-- Result -->
            <div class="fc-result" id="fc-result" style="display:none">
                <div class="fc-result-grid">
                    <div class="fc-result-item">
                        <div class="fc-result-label" id="fc-rl-tuition">Annual Tuition Range</div>
                        <div class="fc-result-val" id="fc-tuition">—</div>
                    </div>
                    <div class="fc-result-item" id="fc-transport-row">
                        <div class="fc-result-label" id="fc-rl-transport">Transport (per year)</div>
                        <div class="fc-result-val" id="fc-transport-val">—</div>
                    </div>
                    <div class="fc-result-item fc-result-total">
                        <div class="fc-result-label" id="fc-rl-total">Total Annual Estimate</div>
                        <div class="fc-result-val fc-total-val" id="fc-total">—</div>
                    </div>
                </div>
                <p class="fc-note" id="fc-note">Fees are estimates based on current data. Contact school for exact fees.</p>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.fee-calc-sec{background:var(--bg);padding:3.5rem 2rem;}
.fc-card{background:white;border-radius:14px;border:1.5px solid var(--border);padding:2rem 2rem 1.6rem;margin-top:2rem;box-shadow:0 2px 16px rgba(15,41,66,.06);}
.fc-inputs{display:grid;grid-template-columns:repeat(4,1fr);gap:1.1rem;}
.fc-field{display:flex;flex-direction:column;gap:.45rem;}
.fc-label{font-size:.8rem;font-weight:600;color:var(--muted);letter-spacing:.03em;text-transform:uppercase;}
.fc-sel{width:100%;}
.fc-result{margin-top:2rem;border-top:1.5px solid var(--border);padding-top:1.6rem;}
.fc-result-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;}
.fc-result-item{background:var(--light);border-radius:12px;padding:1.1rem 1.2rem;border:1.5px solid var(--border);}
.fc-result-total{background:#E8F5F2;border-color:rgba(20,143,119,.25);}
.fc-result-label{font-size:.76rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.04em;margin-bottom:.35rem;}
.fc-result-val{font-family:'Sora',sans-serif;font-size:1.05rem;font-weight:700;color:var(--navy);}
.fc-total-val{color:var(--teal);font-size:1.15rem;}
.fc-note{text-align:center;font-size:.78rem;color:var(--muted);margin-top:1.1rem;font-style:italic;}
@media(max-width:900px){.fc-inputs{grid-template-columns:1fr 1fr;}.fc-result-grid{grid-template-columns:1fr;}}
@media(max-width:600px){.fc-inputs{grid-template-columns:1fr;}}
</style>
@endpush

@push('scripts')
<script>
(function(){
    const FEES = {
        British:  { KG:[180000,350000],  Primary:[250000,500000],  Middle:[350000,700000],  High:[450000,1100000] },
        American: { KG:[200000,400000],  Primary:[280000,550000],  Middle:[380000,750000],  High:[500000,900000]  },
        German:   { KG:[90000,150000],   Primary:[120000,200000],  Middle:[150000,250000],  High:[180000,300000]  },
        French:   { KG:[70000,120000],   Primary:[90000,160000],   Middle:[110000,200000],  High:[130000,250000]  },
    };
    const TRANSPORT = [30000, 60000];

    function fmt(n){ return 'EGP ' + (n>=1000000 ? (n/1000000).toFixed(1)+'M' : Math.round(n/1000)+'K'); }

    window.calcFees = function(){
        const children  = parseInt(document.getElementById('fc-children').value);
        const type      = document.getElementById('fc-type').value;
        const grade     = document.getElementById('fc-grade').value;
        const transport = document.getElementById('fc-transport').value === 'yes';

        const [tMin, tMax] = FEES[type][grade];
        const tuitionMin = tMin * children;
        const tuitionMax = tMax * children;

        const trMin = transport ? TRANSPORT[0] * children : 0;
        const trMax = transport ? TRANSPORT[1] * children : 0;

        document.getElementById('fc-tuition').textContent = fmt(tuitionMin) + ' – ' + fmt(tuitionMax);

        const trRow = document.getElementById('fc-transport-row');
        if(transport){
            trRow.style.display = '';
            document.getElementById('fc-transport-val').textContent = fmt(trMin) + ' – ' + fmt(trMax);
        } else {
            trRow.style.display = 'none';
        }

        document.getElementById('fc-total').textContent = fmt(tuitionMin + trMin) + ' – ' + fmt(tuitionMax + trMax);

        const result = document.getElementById('fc-result');
        result.style.display = '';
        result.scrollIntoView({ behavior:'smooth', block:'nearest' });
    };

    // Also recalculate live on any change
    ['fc-children','fc-type','fc-grade','fc-transport'].forEach(id => {
        const el = document.getElementById(id);
        if(el) el.addEventListener('change', function(){
            if(document.getElementById('fc-result').style.display !== 'none') window.calcFees();
        });
    });
})();
</script>
@endpush
