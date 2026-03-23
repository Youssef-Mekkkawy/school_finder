<!-- BROWSE BY TYPE -->
<section>
    <div class="si">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:.35rem">
            <div>
                <span class="sec-tag" id="tag-bt">School Types</span>
                <h2 class="sec-title" id="ttl-bt">Browse by Type</h2>
                <p class="sec-sub" id="sub-bt">Click any type to filter schools instantly.</p>
            </div>
        </div>
        <div class="tgrid">
            <div class="tcard" id="tc-b" onclick="typeFilter('British',this)">
                <div class="ticon" style="background:#EEF2FF">🇬🇧</div>
                <div class="tname">British</div>
                <div class="tcnt" id="cn-b">—</div>
            </div>
            <div class="tcard" id="tc-a" onclick="typeFilter('American',this)">
                <div class="ticon" style="background:#FFF7ED">🇺🇸</div>
                <div class="tname">American</div>
                <div class="tcnt" id="cn-a">—</div>
            </div>
            <div class="tcard" id="tc-g" onclick="typeFilter('German',this)">
                <div class="ticon" style="background:#F0FDF4">🇩🇪</div>
                <div class="tname">German</div>
                <div class="tcnt" id="cn-g">—</div>
            </div>
            <div class="tcard" id="tc-f" onclick="typeFilter('French',this)">
                <div class="ticon" style="background:#FFF1F2">🇫🇷</div>
                <div class="tname">French</div>
                <div class="tcnt" id="cn-f">—</div>
            </div>
            <div class="tcard" id="tc-i" onclick="typeFilter('IB',this)">
                <div class="ticon" style="background:#F0F9FF">🌐</div>
                <div class="tname">IB / Intl.</div>
                <div class="tcnt" id="cn-i">—</div>
            </div>
        </div>
    </div>
</section>
