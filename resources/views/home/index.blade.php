@extends('layouts.app')

@section('title', 'SchoolFinder Egypt — Find the Right International School')

@section('content')
    @include('home.sections.hero')
    @include('home.sections.school-of-month')
    @include('home.sections.stats')
    @include('home.sections.types')
    @include('home.sections.schools-grid')
    @include('home.sections.how-it-works')
    @include('home.sections.fee-calculator')
    @include('home.sections.cta')
    @include('home.sections.compare-bar')
    @include('home.sections.school-modal')
    @include('home.sections.compare-modal')
    @include('partials.toast')
@endsection

@push('scripts')
    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&loading=async&callback=Function.prototype">
    </script>
    <script>
        /* ═══════════════════════════════════════
           API CONFIG
           ═══════════════════════════════════════ */
        const API_BASE = '/api';
        const getToken = () => localStorage.getItem('sf_token');
        const authHeaders = () => {
            const h = { 'Accept': 'application/json', 'Content-Type': 'application/json' };
            if (getToken()) h['Authorization'] = 'Bearer ' + getToken();
            return h;
        };
        const typeBadge = t => ({ British: 'cb-british', American: 'cb-american', German: 'cb-german', French: 'cb-french' }[t] || 'cb-british');

        /* ═══════════════════════════════════════
           TRANSLATIONS
           ═══════════════════════════════════════ */
        const TR = {
            en: {
                hbadge: "5 International Schools (Demo — full data via Laravel seeder)",
                htitle: `Find the Perfect <span style="color:#52d9bd">International School</span><br>for Your Child`,
                hsub: "Search, compare, and evaluate international schools in Cairo — all in one place.",
                "sbtn-txt": "Search Schools →",
                "fo-t": "School Type", "fo-c": "Curriculum", "fo-l": "Location", "fo-f": "Fee Range",
                "st-l": "Schools (Demo)", "st-c": "Curriculum Types", "st-r": "Parent Reviews", "st-f": "Free", "st-fl": "Always Free",
                "tag-bt": "School Types", "ttl-bt": "Browse by Type", "sub-bt": "Click any type to filter instantly.",
                "tag-sc": "Featured Schools", "ttl-sc": "International Schools in Cairo", "sub-sc": "Verified info and real parent reviews.",
                "va-link": "View all →", "r-lbl": "schools found", "sort-lbl": "Sort by:",
                "so-d": "Default", "so-n": "Name A–Z", "so-fl": "Fee: Low → High", "so-fh": "Fee: High → Low", "so-r": "Highest Rated",
                "no-t": "No schools found", "no-s": "Try adjusting your filters.", "rst-btn": "Clear Filters",
                "tag-hw": "Simple Process", "ttl-hw": "How It Works", "sub-hw": "Find the right school in 4 steps",
                "s1t": "Search & Filter", "s1b": "Filter by curriculum, location, fees, and more.",
                "s2t": "View Profiles", "s2b": "Explore full school profiles with fees, contacts, map, and reviews.",
                "s3t": "Compare Schools", "s3b": "Add up to 3 schools and compare them side by side.",
                "s4t": "Book a Visit", "s4b": "Send an appointment request directly to the school.",
                "cta-t": "Ready to Find the Right School?", "cta-s": "Join thousands of parents making smarter decisions.",
                "cta-b": "Browse All Schools", "cta-r": "Create Free Account",
                "ft-desc": "Egypt's most comprehensive directory of international schools.",
                "ft-s": "Schools", "ft-p": "Platform", "ft-a": "Account",
                "ft-how": "How It Works", "ft-cmp": "Compare Schools", "ft-rev": "Write a Review", "ft-apt": "Book Appointment",
                "ft-login": "Login", "ft-reg": "Register", "ft-fav": "My Favorites", "ft-myrev": "My Reviews",
                "nl-browse": "Browse Schools", "nl-compare": "Compare", "nl-about": "About", "nl-login": "Login", "nl-reg": "Register",
                "cb-lbl": "Compare:", "cb-now": "Compare Now →", "cb-clr": "Clear",
                viewBtn: "View Details →", fav: "Save", cmp: "Compare",
                addFav: "Added to favorites ♥", remFav: "Removed from favorites",
                addCmp: "added to compare", remCmp: "Removed from compare",
                maxCmp: "Maximum 3 schools to compare", alrCmp: "Already in compare list",
                loginReq: "Please login to save favorites",
                revTitle: "Parent Reviews", submitRev: "Submit Review", writeRev: "Write your review...",
                apptTitle: "Book Appointment", apptName: "Your Name", apptEmail: "Email",
                apptDate: "Preferred Date", apptMsg: "Message (optional)", apptSend: "Send Request",
                apptSent: "Appointment request sent! ✓", revSent: "Review submitted! ✓",
                pickStar: "Please select a star rating first.", writeFirst: "Please write your review first.",
                cmpTitle: "Compare Schools", cmpEmpty: "Add schools using the compare button on each card.",
                selMore: "Select at least 2 schools to compare.",
                "lang-lbl": "EN",
            },
            ar: {
                hbadge: "5 مدارس دولية (تجريبي — البيانات الكاملة عبر Laravel)",
                htitle: `ابحث عن <span style="color:#52d9bd">المدرسة الدولية</span> المثالية<br>لطفلك`,
                hsub: "ابحث وقارن وقيّم المدارس الدولية في القاهرة — كل شيء في مكان واحد.",
                "sbtn-txt": "ابحث عن مدارس →",
                "fo-t": "نوع المدرسة", "fo-c": "المنهج", "fo-l": "الموقع", "fo-f": "نطاق المصاريف",
                "st-l": "مدارس (تجريبي)", "st-c": "أنواع المناهج", "st-r": "تقييمات أولياء أمور", "st-f": "مجاني", "st-fl": "مجاني دائماً",
                "tag-bt": "أنواع المدارس", "ttl-bt": "تصفح حسب النوع", "sub-bt": "اضغط على أي نوع للفلترة فوراً.",
                "tag-sc": "مدارس مميزة", "ttl-sc": "المدارس الدولية في القاهرة", "sub-sc": "معلومات موثقة وتقييمات حقيقية.",
                "va-link": "عرض الكل →", "r-lbl": "مدرسة وُجدت", "sort-lbl": "ترتيب حسب:",
                "so-d": "الافتراضي", "so-n": "الاسم أ–ي", "so-fl": "المصاريف: من الأقل", "so-fh": "المصاريف: من الأعلى", "so-r": "الأعلى تقييماً",
                "no-t": "لا توجد مدارس", "no-s": "حاول تعديل الفلاتر.", "rst-btn": "مسح الفلاتر",
                "tag-hw": "خطوات بسيطة", "ttl-hw": "كيف يعمل", "sub-hw": "ابحث عن المدرسة في 4 خطوات",
                "s1t": "ابحث وفلتر", "s1b": "فلتر حسب المنهج والموقع والمصاريف.",
                "s2t": "اعرض الملفات", "s2b": "استكشف ملفات المدارس التفصيلية.",
                "s3t": "قارن المدارس", "s3b": "أضف حتى 3 مدارس وقارنها جنباً إلى جنب.",
                "s4t": "احجز زيارة", "s4b": "أرسل طلب موعد مباشرة للمدرسة.",
                "cta-t": "هل أنت مستعد للعثور على المدرسة؟", "cta-s": "انضم إلى آلاف الآباء الذين يستخدمون SchoolFinder.",
                "cta-b": "تصفح كل المدارس", "cta-r": "إنشاء حساب مجاني",
                "ft-desc": "الدليل الأشمل للمدارس الدولية في مصر.",
                "ft-s": "المدارس", "ft-p": "المنصة", "ft-a": "الحساب",
                "ft-how": "كيف يعمل", "ft-cmp": "مقارنة المدارس", "ft-rev": "اكتب تقييماً", "ft-apt": "احجز موعد",
                "ft-login": "تسجيل الدخول", "ft-reg": "إنشاء حساب", "ft-fav": "مفضلتي", "ft-myrev": "تقييماتي",
                "nl-browse": "تصفح المدارس", "nl-compare": "مقارنة", "nl-about": "عن الموقع", "nl-login": "تسجيل الدخول", "nl-reg": "إنشاء حساب",
                "cb-lbl": "مقارنة:", "cb-now": "قارن الآن →", "cb-clr": "مسح",
                viewBtn: "عرض التفاصيل →", fav: "حفظ", cmp: "قارن",
                addFav: "تم الحفظ في المفضلة ♥", remFav: "تم الإزالة من المفضلة",
                addCmp: "أضيف للمقارنة", remCmp: "تم الإزالة من المقارنة",
                maxCmp: "الحد الأقصى 3 مدارس", alrCmp: "موجود بالفعل",
                loginReq: "سجل دخول لحفظ المفضلة",
                revTitle: "تقييمات أولياء الأمور", submitRev: "إرسال التقييم", writeRev: "اكتب تقييمك...",
                apptTitle: "حجز موعد", apptName: "اسمك", apptEmail: "البريد الإلكتروني",
                apptDate: "التاريخ المفضل", apptMsg: "رسالة (اختياري)", apptSend: "إرسال الطلب",
                apptSent: "تم إرسال طلب الموعد! ✓", revSent: "تم إرسال التقييم! ✓",
                pickStar: "اختر عدد النجوم أولاً.", writeFirst: "اكتب تقييمك أولاً.",
                cmpTitle: "مقارنة المدارس", cmpEmpty: "أضف مدارس باستخدام زر المقارنة على كل بطاقة.",
                selMore: "اختر مدرستين على الأقل للمقارنة.",
                "lang-lbl": "AR",
            }
        };

        /* ═══════════════════════════════════════
           STATE
           ═══════════════════════════════════════ */
        let lang = '{{ app()->getLocale() }}';
        let favs = JSON.parse(localStorage.getItem('sf_favs') || '[]');
        let cmps = [];
        let filtered = [];
        let allData = [];
        let apiMeta = { current_page: 1, last_page: 1, per_page: 12, total: 0 };
        let page = 1;
        let selStar = 0;

        const t = k => (TR[lang][k] || TR.en[k] || k);

        /* ═══════════════════════════════════════
           LANGUAGE
           ═══════════════════════════════════════ */
        function toggleLang() {
            lang = lang === 'en' ? 'ar' : 'en';
            document.documentElement.lang = lang;
            document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
            applyTR();
            renderGrid();
            updateCBar();
            toast(lang === 'ar' ? 'تم التحويل للعربية 🌍' : 'Switched to English 🌍', 'inf');
        }

        function applyTR() {
            Object.keys(TR.en).forEach(k => {
                const el = document.getElementById(k);
                if (!el) return;
                if (k === 'htitle') { el.innerHTML = t(k); return; }
                el.textContent = t(k);
            });
        }

        /* ═══════════════════════════════════════
           TYPE COUNTS
           ═══════════════════════════════════════ */
        function initCounts() {
            const c = { British: 0, American: 0, German: 0, French: 0, IB: 0 };
            allData.forEach(s => {
                if (c[s.type] !== undefined) c[s.type]++;
                if (s.curricula && s.curricula.some(x => x.includes('IB'))) c.IB++;
            });
            const suf = lang === 'ar' ? ' مدارس' : ' schools';
            document.getElementById('cn-b').textContent = c.British + suf;
            document.getElementById('cn-a').textContent = c.American + suf;
            document.getElementById('cn-g').textContent = c.German + suf;
            document.getElementById('cn-f').textContent = c.French + suf;
            document.getElementById('cn-i').textContent = c.IB + suf;
            document.getElementById('st-n').textContent = apiMeta.total || allData.length;
        }

        /* ═══════════════════════════════════════
           TYPE CARD FILTER
           ═══════════════════════════════════════ */
        function typeFilter(type, el) {
            const sel = document.getElementById('fType');
            if (sel.value === type) {
                sel.value = '';
                document.querySelectorAll('.tcard').forEach(c => c.classList.remove('act'));
            } else {
                sel.value = type;
                document.querySelectorAll('.tcard').forEach(c => c.classList.remove('act'));
                if (el) el.classList.add('act');
            }
            page = 1;
            doFilter();
            document.getElementById('schools').scrollIntoView({ behavior: 'smooth' });
        }

        /* ═══════════════════════════════════════
           FILTERS
           ═══════════════════════════════════════ */
        async function loadSchools(pg = 1) {
            const q = document.getElementById('qInput').value.trim();
            const ty = document.getElementById('fType').value;
            const cu = document.getElementById('fCurr').value;
            const lo = document.getElementById('fLoc').value;
            const fe = document.getElementById('fFee').value;
            const so = document.getElementById('sortSel').value;

            const params = new URLSearchParams({ per_page: 12, page: pg });
            if (q) params.set('search', q);
            if (ty) params.set('type', ty);
            if (cu) params.set('curriculum', cu);
            if (lo) params.set('location', lo);

            // fee range (values are in EGP thousands e.g. '100-300' means 100K–300K)
            if (fe) {
                const feeMap = {
                    '0-100': { fee_max: 100000 },
                    '100-300': { fee_min: 100000, fee_max: 300000 },
                    '300-600': { fee_min: 300000, fee_max: 600000 },
                    '600-9999': { fee_min: 600000 },
                };
                const fm = feeMap[fe] || {};
                if (fm.fee_min) params.set('fee_min', fm.fee_min);
                if (fm.fee_max) params.set('fee_max', fm.fee_max);
            }

            const sortMap = { name: 'name', 'fee-lo': 'fee_low', 'fee-hi': 'fee_high', rating: 'rating' };
            if (sortMap[so]) params.set('sort', sortMap[so]);

            try {
                const res = await fetch(`${API_BASE}/schools?${params}`, { headers: authHeaders() });
                const json = await res.json();
                if (json.success) {
                    filtered = json.data;
                    apiMeta = json.meta;
                    allData = [...allData, ...json.data].filter((s, i, a) => a.findIndex(x => x.id === s.id) === i);
                    page = pg;
                }
            } catch (e) {
                console.error('Failed to load schools', e);
            }

            renderGrid();
            renderChips(q, ty, cu, lo, fe);
            initCounts();
        }

        function doFilter() { page = 1; loadSchools(1); }

        function resetAll() {
            document.getElementById('qInput').value = '';
            ['fType', 'fCurr', 'fLoc', 'fFee'].forEach(id => document.getElementById(id).value = '');
            document.getElementById('sortSel').value = 'default';
            document.querySelectorAll('.tcard').forEach(c => c.classList.remove('act'));
            document.getElementById('chips').innerHTML = '';
            loadSchools(1);
        }

        /* ═══════════════════════════════════════
           CHIPS
           ═══════════════════════════════════════ */
        const CLEARS = [];
        function renderChips(q, ty, cu, lo, fe) {
            CLEARS.length = 0;
            const items = [];
            if (q) { items.push(`"${q}"`); CLEARS.push(() => { document.getElementById('qInput').value = ''; doFilter(); }); }
            if (ty) { items.push(ty); CLEARS.push(() => { document.getElementById('fType').value = ''; document.querySelectorAll('.tcard').forEach(c => c.classList.remove('act')); doFilter(); }); }
            if (cu) { items.push(cu); CLEARS.push(() => { document.getElementById('fCurr').value = ''; doFilter(); }); }
            if (lo) { items.push(lo); CLEARS.push(() => { document.getElementById('fLoc').value = ''; doFilter(); }); }
            if (fe) { const m = { '0-100': '<100K', '100-300': '100-300K', '300-600': '300-600K', '600-9999': '600K+' }; items.push(m[fe] || fe); CLEARS.push(() => { document.getElementById('fFee').value = ''; doFilter(); }); }
            const wrap = document.getElementById('chips');
            if (!items.length) { wrap.innerHTML = ''; return; }
            wrap.innerHTML = items.map((lbl, i) => `<span class="chip">${lbl}<span class="chip-x" onclick="CLEARS[${i}]()"> ✕</span></span>`).join('')
                + `<span class="clear-all" onclick="resetAll()">${lang === 'ar' ? 'مسح الكل' : 'Clear all'}</span>`;
        }

        /* ═══════════════════════════════════════
           RENDER GRID
           ═══════════════════════════════════════ */
        function renderGrid() {
            const grid = document.getElementById('grid');
            const nores = document.getElementById('nores');
            document.getElementById('rcount').textContent = apiMeta.total ?? filtered.length;
            if (!filtered.length) { grid.innerHTML = ''; nores.style.display = 'block'; document.getElementById('pgbar').innerHTML = ''; return; }
            nores.style.display = 'none';
            grid.innerHTML = filtered.map(s => {
                const isFav = favs.includes(s.id), isCmp = cmps.includes(s.id);
                const badge = typeBadge(s.type);
                const feeDisp = s.feeDisplay || 'N/A';
                const rating = s.rating != null ? `★ ${s.rating}` : '★ —';
                const reviewCount = s.reviewCount ?? 0;
                return `
        <div class="card">
          <div class="ct">
            <span class="cbadge ${badge}">${s.type}</span>
            <div class="cbtns">
              <button class="ibtn ${isFav ? 'fav-on' : ''}" onclick="toggleFav(${s.id})" title="${t('fav')}">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="${isFav ? '#e74c3c' : 'none'}" stroke="${isFav ? '#e74c3c' : 'currentColor'}" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
              </button>
              <button class="ibtn ${isCmp ? 'cmp-on' : ''}" onclick="toggleCmp(${s.id})" title="${t('cmp')}">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
              </button>
            </div>
          </div>
          <div class="cb">
            <div class="cname">${s.name}</div>
            <div class="cloc">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              ${s.area || s.location}
            </div>
            <div class="ctags">${(s.curricula || []).map(c => `<span class="tag">${c}</span>`).join('')}</div>
            <div class="cf">
              <div><div class="cfee">${feeDisp}</div><div class="cfeesub">${lang === 'ar' ? '/ سنة' : '/ year'}</div></div>
              <div class="crat">${rating} <span class="crev">(${reviewCount})</span></div>
            </div>
            <button class="vbtn" onclick="openSch(${s.id})">${t('viewBtn')}</button>
          </div>
        </div>`;
            }).join('');
            renderPg();
        }

        /* ═══════════════════════════════════════
           PAGINATION
           ═══════════════════════════════════════ */
        function renderPg() {
            const tot = apiMeta.last_page || 1, cur = apiMeta.current_page || 1, bar = document.getElementById('pgbar');
            if (tot <= 1) { bar.innerHTML = ''; return; }
            let h = `<button class="pgb" onclick="goPg(${cur - 1})" ${cur === 1 ? 'disabled' : ''}>‹</button>`;
            for (let i = 1; i <= tot; i++) h += `<button class="pgb ${i === cur ? 'on' : ''}" onclick="goPg(${i})">${i}</button>`;
            h += `<button class="pgb" onclick="goPg(${cur + 1})" ${cur === tot ? 'disabled' : ''}>›</button>`;
            bar.innerHTML = h;
        }
        function goPg(p) { if (p < 1 || p > apiMeta.last_page) return; loadSchools(p); document.getElementById('schools').scrollIntoView({ behavior: 'smooth' }); }

        /* ═══════════════════════════════════════
           FAVORITES
           ═══════════════════════════════════════ */
        async function toggleFav(id) {
            if (!getToken()) { toast(t('loginReq'), 'err'); return; }
            const adding = !favs.includes(id);
            const method = adding ? 'POST' : 'DELETE';
            try {
                await fetch(`${API_BASE}/favorites/${id}`, { method, headers: authHeaders() });
                if (adding) { favs.push(id); toast(t('addFav'), 'ok'); }
                else { favs = favs.filter(x => x !== id); toast(t('remFav'), 'inf'); }
                localStorage.setItem('sf_favs', JSON.stringify(favs));
                renderGrid();
            } catch (e) { toast('Failed to update favorite', 'err'); }
        }

        /* ═══════════════════════════════════════
           COMPARE
           ═══════════════════════════════════════ */
        function toggleCmp(id) {
            if (cmps.includes(id)) { cmps = cmps.filter(x => x !== id); toast(t('remCmp'), 'inf'); }
            else {
                if (cmps.length >= 3) { toast(t('maxCmp'), 'err'); return; }
                cmps.push(id);
                const s = allData.find(x => x.id === id);
                toast(`${s ? s.name.split(' ').slice(0, 3).join(' ') + '...' : 'School'} ${t('addCmp')}`, 'ok');
            }
            updateCBar();
            renderGrid();
        }
        function clearCmp() { cmps = []; updateCBar(); renderGrid(); }
        function updateCBar() {
            const bar = document.getElementById('cbar'), items = document.getElementById('cbitems');
            items.innerHTML = cmps.map(id => { const s = allData.find(x => x.id === id); return `<div class="ci">${s ? s.name.split(' ').slice(0, 2).join(' ') : 'School'}<span class="cir" onclick="toggleCmp(${id})">✕</span></div>`; }).join('');
            bar.classList.toggle('on', cmps.length > 0);
        }

        /* ═══════════════════════════════════════
           COMPARE MODAL
           ═══════════════════════════════════════ */
        async function showCmpModal() {
            if (!cmps.length) { toast(t('cmpEmpty'), 'inf'); return; }
            if (cmps.length < 2) { toast(t('selMore'), 'inf'); return; }
            const params = cmps.map(id => `ids[]=${id}`).join('&');
            let schools;
            try {
                const res = await fetch(`${API_BASE}/schools/compare?${params}`, { headers: authHeaders() });
                const json = await res.json();
                schools = json.data;
            } catch (e) {
                schools = cmps.map(id => allData.find(s => s.id === id)).filter(Boolean);
            }
            const fields = [
                { k: lang === 'ar' ? 'النوع' : 'Type', v: s => s.type || '—' },
                { k: lang === 'ar' ? 'الموقع' : 'Location', v: s => s.area || s.location || '—' },
                { k: lang === 'ar' ? 'المناهج' : 'Curricula', v: s => (s.curricula || []).join(', ') },
                { k: lang === 'ar' ? 'المصاريف' : 'Fees', v: s => s.feeDisplay || '—' },
                { k: lang === 'ar' ? 'العمر' : 'Age Range', v: s => `${s.age_min || '?'}–${s.age_max || '?'} ${lang === 'ar' ? 'سنة' : 'yrs'}` },
                { k: lang === 'ar' ? 'حجم الفصل' : 'Class Size', v: s => s.class_size_avg ? `~${s.class_size_avg}` : 'N/A' },
                { k: lang === 'ar' ? 'التقييم' : 'Rating', v: s => s.rating != null ? `★ ${s.rating}` : '★ —' },
                { k: lang === 'ar' ? 'المواصلات' : 'Transport', v: s => s.transport || '—' },
            ];
            const cw = Math.floor(100 / (schools.length + 1));
            let html = `<div style="overflow-x:auto"><table style="width:100%;border-collapse:collapse;font-size:.84rem;min-width:500px">
        <thead><tr>
          <th style="padding:.55rem .8rem;text-align:${lang === 'ar' ? 'right' : 'left'};border-bottom:2px solid var(--border);color:var(--muted);font-weight:600;width:${cw}%">${lang === 'ar' ? 'الخاصية' : 'Feature'}</th>
          ${schools.map(s => `<th style="padding:.55rem .8rem;text-align:${lang === 'ar' ? 'right' : 'left'};border-bottom:2px solid var(--teal);color:var(--navy);font-family:'Sora',sans-serif;font-weight:700;font-size:.82rem;width:${cw}%">${s.name}</th>`).join('')}
        </tr></thead>
        <tbody>${fields.map((f, idx) => `
          <tr style="background:${idx % 2 === 0 ? '#F8FAFF' : 'white'}">
            <td style="padding:.55rem .8rem;color:var(--muted);font-weight:500">${f.k}</td>
            ${schools.map(s => `<td style="padding:.55rem .8rem;color:var(--text);font-weight:500">${f.v(s)}</td>`).join('')}
          </tr>`).join('')}
        </tbody>
      </table></div>`;
            document.getElementById('cmp-mod-t').textContent = t('cmpTitle');
            document.getElementById('cmp-body').innerHTML = html;
            document.getElementById('cmpMod').classList.add('open');
        }

        /* ═══════════════════════════════════════
           SCHOOL DETAIL MODAL
           ═══════════════════════════════════════ */
        async function openSch(id) {
            selStar = 0;
            document.getElementById('mod-title').textContent = 'Loading...';
            document.getElementById('mod-body').innerHTML = '<div style="padding:2rem;text-align:center;color:var(--muted)">Loading...</div>';
            document.getElementById('schMod').classList.add('open');

            let s;
            try {
                const res = await fetch(`${API_BASE}/schools/${id}`, { headers: authHeaders() });
                const json = await res.json();
                s = json.data;
            } catch (e) {
                document.getElementById('mod-body').innerHTML = '<div style="padding:2rem;color:red">Failed to load school data.</div>';
                return;
            }

            const L = lang === 'ar';
            const loc = s.location ? (s.location.area + ', ' + s.location.city) : (s.area || '—');
            const avg = s.rating || 0;
            const reviews = s.reviews || [];

            // Check review eligibility
            let canReviewData = { can_review: false, reason: 'not_logged_in', has_appointment: false };
            try {
                const crRes = await fetch(`${API_BASE}/schools/${id}/can-review`, { headers: authHeaders() });
                if (crRes.ok) canReviewData = await crRes.json();
            } catch (e) { /* fall back to not_logged_in */ }

            document.getElementById('mod-title').textContent = s.name;
            document.getElementById('mod-body').innerHTML = `
        <!-- Info -->
        <div class="msec">
          <h4>${L ? 'معلومات المدرسة' : 'School Information'}</h4>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem .8rem">
            ${mr(L ? 'النوع' : 'Type', s.type || '—')}
            ${mr(L ? 'الموقع' : 'Location', loc)}
            ${mr(L ? 'العمر' : 'Age Range', `${s.age_min || '?'}–${s.age_max || '?'} ${L ? 'سنة' : 'yrs'}`)}
            ${mr(L ? 'حجم الفصل' : 'Class Size', s.class_size_avg ? `~${s.class_size_avg}` : 'N/A')}
            ${mr(L ? 'عدد الطلاب' : 'Students', s.num_students || 'N/A')}
            ${mr(L ? 'المواصلات' : 'Transport', s.transport || '—')}
          </div>
        </div>
        <!-- Fees -->
        <div class="msec">
          <h4>${L ? 'المصاريف' : 'Fees'}</h4>
          <div style="background:#F8FAFF;border-radius:10px;padding:.9rem 1rem;border:1.5px solid var(--border)">
            <div style="font-family:'Sora',sans-serif;font-size:1.25rem;font-weight:800;color:var(--navy)">${s.feeDisplay || '—'}</div>
            <div style="font-size:.8rem;color:var(--muted);margin-top:.15rem">${L ? 'سنوياً — العام الدراسي 2024/2025' : 'per year — Academic Year 2024/2025'}</div>
          </div>
        </div>
        <!-- Curricula -->
        <div class="msec">
          <h4>${L ? 'المناهج والشهادات' : 'Curricula & Certificates'}</h4>
          <div style="display:flex;flex-wrap:wrap;gap:.4rem">${(s.curricula || []).map(c => `<span class="tag" style="font-size:.84rem;padding:.28rem .75rem">${c}</span>`).join('')}</div>
        </div>
        <!-- Contact -->
        <div class="msec">
          <h4>${L ? 'التواصل' : 'Contact'}</h4>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem .8rem">
            ${s.phone ? mr(L ? 'الهاتف' : 'Phone', `<a href="tel:${s.phone}" style="color:var(--teal);text-decoration:none">${s.phone}</a>`) : ''}
            ${s.email ? mr(L ? 'الإيميل' : 'Email', `<a href="mailto:${s.email}" style="color:var(--teal);text-decoration:none">${s.email}</a>`) : ''}
            ${s.website ? mr(L ? 'الموقع' : 'Website', `<a href="${s.website}" target="_blank" style="color:var(--teal);text-decoration:none">${s.website.replace('https://', '')}</a>`) : ''}
            ${s.facebook ? mr('Facebook', `<a href="${s.facebook}" target="_blank" style="color:var(--teal);text-decoration:none">View Page</a>`) : ''}
            ${s.instagram ? mr('Instagram', `<a href="${s.instagram}" target="_blank" style="color:var(--teal);text-decoration:none">View Profile</a>`) : ''}
          </div>
        </div>
        <!-- Map -->
        <div class="msec">
          <h4>${L ? 'الموقع على الخريطة' : 'Location on Map'}</h4>
          ${(s.location && s.location.latitude && s.location.longitude)
            ? `<div id="school-map-canvas" style="width:100%;height:280px;border-radius:10px;border:1.5px solid var(--border);overflow:hidden"></div>`
            : `<div class="map-ph">📍 ${loc}</div>`
          }
        </div>
        <!-- Reviews -->
        <div class="msec">
          <h4>${t('revTitle')} — ★ ${avg} (${s.reviewCount || 0})</h4>
          ${reviews.length ? reviews.map(r => `
            <div class="rev-item">
              <div class="rev-auth">${r.user || 'Anonymous'}${r.is_verified ? `<span style="background:#E8F5F2;color:var(--teal);font-size:.68rem;font-weight:700;padding:.15rem .55rem;border-radius:20px;margin-left:.4rem;font-family:'Sora',sans-serif">✓ Verified Parent</span>` : ''}</div>
              <div class="rev-stars">${'★'.repeat(r.rating)}${'☆'.repeat(5 - r.rating)}</div>
              <div class="rev-txt">${r.comment}</div>
            </div>`).join('') : `<div style="color:var(--muted);font-size:.87rem;padding:.5rem 0">${L ? 'لا توجد تقييمات بعد.' : 'No reviews yet.'}</div>`}
        </div>
        <!-- Write Review -->
        <div class="msec">
          <h4>${t('submitRev')}</h4>
          ${canReviewData.can_review ? `
            <div style="background:#E8F5F2;border:1.5px solid var(--teal);border-radius:10px;padding:.7rem 1rem;margin-bottom:.9rem;font-size:.85rem;color:var(--teal);font-weight:600">
              ✓ You visited this school — your review will be marked as Verified.
            </div>
            <div class="star-r" id="stars">${[1,2,3,4,5].map(i=>`<span class="star" id="st${i}" onclick="setStar(${i})">★</span>`).join('')}</div>
            <textarea class="ri" id="revTxt" rows="3" placeholder="${t('writeRev')}"></textarea>
            <button class="sub-btn" onclick="submitRev(${s.id})">${t('submitRev')}</button>
          ` : canReviewData.reason === 'not_logged_in' ? `
            <div style="background:#F0F6FF;border:1.5px solid var(--border);border-radius:10px;padding:1rem 1.1rem;text-align:center">
              <div style="font-size:.9rem;color:var(--muted);margin-bottom:.6rem">Sign in to leave a review for this school.</div>
              <button class="sub-btn" onclick="document.getElementById('loginBtn')?.click()" style="width:auto;padding:.45rem 1.4rem">Login / Sign Up</button>
            </div>
          ` : `
            <div style="background:#FFF8F2;border:1.5px solid var(--warn);border-radius:10px;padding:1rem 1.1rem">
              <div style="font-weight:700;color:var(--warn);margin-bottom:.35rem;font-family:'Sora',sans-serif;font-size:.9rem">Visit Required</div>
              <div style="font-size:.84rem;color:var(--muted);margin-bottom:.7rem">Only parents who have visited this school can submit a review. Book an appointment to schedule your visit.</div>
              <a href="{{ route('dashboard') }}">
                <button class="sub-btn" onclick="scrollToAppt()" style="background:var(--warn);width:auto;padding:.45rem 1.4rem">Book Appointment →</button>
              </a>
            </div>
          `}
        </div>
        <!-- Appointment -->
        <div class="msec" id="appt-section">
          <h4>${t('apptTitle')}</h4>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:.7rem;margin-bottom:.7rem">
            <input class="fi-input" id="apptDate" type="date">
            <input class="fi-input" id="apptMsg" placeholder="${t('apptMsg')}">
          </div>
          <button class="sub-btn" onclick="submitAppt(${s.id})">${t('apptSend')}</button>
        </div>
      `;
            if (s.location && s.location.latitude && s.location.longitude) {
                initSchoolMap(s.location.latitude, s.location.longitude, s.name);
            }
        }

        function mr(lbl, val) { return `<div><div class="mlbl">${lbl}</div><div class="mval">${val}</div></div>`; }
        function closeSch(e) { if (e.target === document.getElementById('schMod')) document.getElementById('schMod').classList.remove('open'); }
        function initSchoolMap(lat, lng, name) {
            const tryInit = () => {
                if (typeof google === 'undefined' || !google.maps) { setTimeout(tryInit, 150); return; }
                const el = document.getElementById('school-map-canvas');
                if (!el) return;
                const pos = { lat: parseFloat(lat), lng: parseFloat(lng) };
                const map = new google.maps.Map(el, { center: pos, zoom: 15 });
                new google.maps.Marker({ position: pos, map, title: name });
            };
            tryInit();
        }
        function setStar(n) { selStar = n; for (let i = 1; i <= 5; i++)document.getElementById('st' + i).classList.toggle('on', i <= n); }
        function scrollToAppt() { const el = document.getElementById('appt-section'); if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
        async function submitRev(id) {
            if (!selStar) { toast(t('pickStar'), 'err'); return; }
            const txt = document.getElementById('revTxt').value.trim();
            if (!txt) { toast(t('writeFirst'), 'err'); return; }
            if (!getToken()) { toast(t('loginReq'), 'err'); return; }
            try {
                const res = await fetch(`${API_BASE}/schools/${id}/reviews`, {
                    method: 'POST', headers: authHeaders(),
                    body: JSON.stringify({ rating: selStar, comment: txt }),
                });
                const json = await res.json();
                if (res.ok && json.success) { toast(t('revSent'), 'ok'); openSch(id); }
                else toast(json.message || 'Failed to submit review', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }
        async function submitAppt(id) {
            if (!getToken()) { toast(t('loginReq'), 'err'); return; }
            const preferred_date = document.getElementById('apptDate')?.value;
            const message = document.getElementById('apptMsg')?.value || '';
            if (!preferred_date) { toast('Please select a date', 'err'); return; }
            try {
                const res = await fetch(`${API_BASE}/appointments`, {
                    method: 'POST', headers: authHeaders(),
                    body: JSON.stringify({ school_id: id, preferred_date, message }),
                });
                const json = await res.json();
                if (res.ok && json.success) { toast(t('apptSent'), 'ok'); setTimeout(() => document.getElementById('schMod').classList.remove('open'), 700); }
                else toast(json.message || 'Failed to send request', 'err');
            } catch (e) { toast('Network error', 'err'); }
        }

        /* ═══════════════════════════════════════
           TOAST
           ═══════════════════════════════════════ */
        let ttimer;
        function toast(msg, type = 'inf') {
            const el = document.getElementById('toast');
            el.textContent = msg; el.className = `toast show ${type}`;
            clearTimeout(ttimer);
            ttimer = setTimeout(() => el.className = 'toast', 2500);
        }

        /* ═══════════════════════════════════════
           HOMEPAGE SETTINGS
           ═══════════════════════════════════════ */
        async function loadHomepageSettings() {
            try {
                const res  = await fetch(`${API_BASE}/homepage/settings`);
                const json = await res.json();
                if (!json.success) return;
                const s = json.data;

                // Hero
                if (s.hero) {
                    if (s.hero.badge)    document.getElementById('hbadge').textContent = s.hero.badge;
                    if (s.hero.title)    document.getElementById('htitle').innerHTML   = s.hero.title;
                    if (s.hero.subtitle) document.getElementById('hsub').textContent   = s.hero.subtitle;
                }

                // Stats — [schools, reviews, curricula, free]
                if (s.stats && s.stats.length >= 4) {
                    const ids = [
                        { val: 'st-n',  lbl: 'st-l'  },
                        { val: 'st-rn', lbl: 'st-r'  },
                        { val: 'st-cn', lbl: 'st-c'  },
                        { val: 'st-f',  lbl: 'st-fl' },
                    ];
                    s.stats.forEach((stat, i) => {
                        const el = ids[i];
                        if (!el) return;
                        if (stat.value) document.getElementById(el.val).textContent = stat.value;
                        if (stat.label) document.getElementById(el.lbl).textContent = stat.label;
                    });
                }
            } catch (e) {}
        }

        /* ═══════════════════════════════════════
           INIT
           ═══════════════════════════════════════ */
        // Load favorites from API if logged in, then load schools
        async function init() {
            await loadHomepageSettings();
            if (getToken()) {
                try {
                    const res = await fetch(`${API_BASE}/favorites`, { headers: authHeaders() });
                    const json = await res.json();
                    if (json.success) {
                        favs = (json.data || []).map(f => f.id || f.school_id);
                        localStorage.setItem('sf_favs', JSON.stringify(favs));
                    }
                } catch (e) { /* use cached favs */ }
            }
            await loadSchools(1);
            applyTR();
        }
        init();

        function toggleUserMenu(e) {
            e.stopPropagation();
            var dd  = document.getElementById('user-dropdown');
            var btn = document.getElementById('avatar-btn');
            var now = dd.classList.toggle('open');
            btn.setAttribute('aria-expanded', now ? 'true' : 'false');
        }

        document.addEventListener('click', function () {
            var dd  = document.getElementById('user-dropdown');
            var btn = document.getElementById('avatar-btn');
            if (dd)  dd.classList.remove('open');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        });

        function doLogoutNav() {
            localStorage.removeItem('sf_token');
            localStorage.removeItem('sf_user');
            localStorage.removeItem('sf_favs');
            window.location.href = '/login';
        }

    </script>
@endpush
