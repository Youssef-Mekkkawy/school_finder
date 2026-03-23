<!-- HERO -->
<div class="hero">
    <div class="hero-i">
        <div class="hero-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <span id="hbadge">5 International Schools (Demo)</span>
        </div>
        <h1 id="htitle">Find the Perfect <span>International School</span><br>for Your Child</h1>
        <p class="hero-sub" id="hsub">Search, compare, and evaluate international schools in Cairo — all in one place.
            Save hours of research with powerful filters and real parent reviews.</p>
        <div class="sbox">
            <div class="srow">
                <div class="sinput" style="flex:2">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5D7285" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    <input type="text" id="qInput" placeholder="Search by school name, area, or curriculum..."
                        oninput="doFilter()">
                </div>
                <button class="sbtn" onclick="doFilter()" id="sbtn-txt">Search Schools →</button>
            </div>
            <div class="frow">
                <select class="fsel" id="fType" onchange="doFilter()">
                    <option value="" id="fo-t">School Type</option>
                    <option>British</option>
                    <option>American</option>
                    <option>German</option>
                    <option>French</option>
                </select>
                <select class="fsel" id="fCurr" onchange="doFilter()">
                    <option value="" id="fo-c">Curriculum</option>
                    <option value="IGCSE">IGCSE</option>
                    <option value="IB">IB Diploma</option>
                    <option value="American Diploma">American Diploma</option>
                    <option value="Abitur">Abitur</option>
                    <option value="French Bac">French Bac</option>
                </select>
                <select class="fsel" id="fLoc" onchange="doFilter()">
                    <option value="" id="fo-l">Location</option>
                    <option>New Cairo</option>
                    <option>Maadi</option>
                    <option>Sheikh Zayed</option>
                    <option value="6th of October">6th of October</option>
                    <option>El-Shorouk</option>
                </select>
                <select class="fsel" id="fFee" onchange="doFilter()">
                    <option value="" id="fo-f">Fee Range</option>
                    <option value="0-100">Under EGP 100K</option>
                    <option value="100-300">EGP 100K – 300K</option>
                    <option value="300-600">EGP 300K – 600K</option>
                    <option value="600-9999">EGP 600K+</option>
                </select>
            </div>
            <div class="chips" id="chips"></div>
        </div>
    </div>
</div>
