@extends('layouts.app')

@section('title', __('messages.nav.browse') . ' — SchoolFinder Egypt')

@push('styles')
    <style>
        /* ── Page Layout ─────────────────────────────────── */
        .schools-page {
            min-height: 100vh;
            background: var(--bg, #F7FAFD);
            padding-bottom: 80px;
        }

        /* ── Hero Bar ────────────────────────────────────── */
        .sp-hero {
            background: #0F2942;
            padding: 48px 0 40px;
            position: relative;
            overflow: hidden;
        }

        .sp-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 50%, rgba(20, 143, 119, .18) 0%, transparent 60%);
            pointer-events: none;
        }

        .sp-hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        .sp-hero h1 {
            font-family: 'Sora', sans-serif;
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 700;
            color: #fff;
            margin: 0 0 6px;
        }

        .sp-hero p {
            font-family: 'DM Sans', sans-serif;
            color: rgba(255, 255, 255, .65);
            font-size: 15px;
            margin: 0 0 28px;
        }

        /* ── Search Bar ──────────────────────────────────── */
        .sp-search-wrap {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .sp-search-box {
            flex: 1;
            min-width: 260px;
            position: relative;
        }

        .sp-search-box svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #5D7285;
            pointer-events: none;
        }

        .sp-search-box input {
            width: 100%;
            height: 46px;
            padding: 0 16px 0 42px;
            border-radius: 10px;
            border: 1.5px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .08);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border .2s, background .2s;
        }

        .sp-search-box input::placeholder {
            color: rgba(255, 255, 255, .4);
        }

        .sp-search-box input:focus {
            border-color: #148F77;
            background: rgba(255, 255, 255, .12);
        }

        .sp-search-btn {
            height: 46px;
            padding: 0 24px;
            background: #148F77;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
            white-space: nowrap;
        }

        .sp-search-btn:hover {
            background: #117a65;
        }

        /* ── Filter Bar ──────────────────────────────────── */
        .sp-filters {
            background: #fff;
            border-bottom: 1px solid #D6E4F0;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 8px rgba(15, 41, 66, .06);
        }

        .sp-filters-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            min-height: 62px;
        }

        .sp-select {
            height: 36px;
            padding: 0 32px 0 12px;
            border: 1.5px solid #D6E4F0;
            border-radius: 8px;
            background: #F7FAFD url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%235D7285' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E") no-repeat right 10px center;
            color: #1C2B3A;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            appearance: none;
            cursor: pointer;
            outline: none;
            transition: border .2s;
        }

        .sp-select:focus {
            border-color: #148F77;
        }

        .sp-sort-wrap {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sp-sort-wrap label {
            font-size: 13px;
            color: #5D7285;
            white-space: nowrap;
            font-family: 'DM Sans', sans-serif;
        }

        .sp-clear-btn {
            height: 36px;
            padding: 0 14px;
            border: 1.5px solid #D6E4F0;
            border-radius: 8px;
            background: #fff;
            color: #5D7285;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: border .2s, color .2s;
        }

        .sp-clear-btn:hover {
            border-color: #e74c3c;
            color: #e74c3c;
        }

        /* ── Main Content ────────────────────────────────── */
        .sp-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 24px 0;
        }

        .sp-results-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .sp-results-count {
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            color: #5D7285;
        }

        .sp-results-count strong {
            color: #0F2942;
            font-weight: 700;
        }

        /* ── School Cards Grid ───────────────────────────── */
        .sp-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 20px;
        }

        /* ── School Card ─────────────────────────────────── */
        .school-card {
            background: #fff;
            border-radius: 14px;
            border: 1.5px solid #D6E4F0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: transform .2s, box-shadow .2s, border-color .2s;
            cursor: pointer;
        }

        .school-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(15, 41, 66, .1);
            border-color: #148F77;
        }

        .sc-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 8px;
        }

        .sc-type-badge {
            font-size: 11px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            padding: 3px 10px;
            border-radius: 20px;
            background: #F0F6FF;
            color: #1A5276;
            letter-spacing: .02em;
        }

        .sc-actions {
            display: flex;
            gap: 6px;
        }

        .sc-action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1.5px solid #D6E4F0;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: border-color .2s, background .2s;
            color: #5D7285;
        }

        .sc-action-btn:hover {
            border-color: #148F77;
            color: #148F77;
        }

        .sc-action-btn.active {
            background: #148F77;
            border-color: #148F77;
            color: #fff;
        }

        .sc-name {
            font-family: 'Sora', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: #0F2942;
            line-height: 1.35;
            margin: 0;
        }

        .sc-location {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #5D7285;
            font-family: 'DM Sans', sans-serif;
        }

        .sc-curricula {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .sc-tag {
            font-size: 11px;
            padding: 3px 9px;
            border-radius: 6px;
            background: #F0F6FF;
            color: #1A5276;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
        }

        .sc-fee {
            font-family: 'Sora', sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: #0F2942;
        }

        .sc-fee span {
            font-size: 12px;
            font-weight: 400;
            color: #5D7285;
            font-family: 'DM Sans', sans-serif;
        }

        .sc-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }

        .sc-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #5D7285;
            font-family: 'DM Sans', sans-serif;
        }

        .sc-rating .star {
            color: #F39C12;
        }

        .sc-view-btn {
            height: 34px;
            padding: 0 16px;
            background: #F0F6FF;
            color: #1A5276;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .sc-view-btn:hover {
            background: #148F77;
            color: #fff;
        }

        /* ── Skeleton Loader ─────────────────────────────── */
        .sp-skeleton {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 20px;
        }

        .sk-card {
            background: #fff;
            border-radius: 14px;
            border: 1.5px solid #D6E4F0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sk-line {
            background: linear-gradient(90deg, #F0F6FF 25%, #e8f0f8 50%, #F0F6FF 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
            border-radius: 6px;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0
            }

            100% {
                background-position: -200% 0
            }
        }

        /* ── Pagination ──────────────────────────────────── */
        .sp-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 48px;
            flex-wrap: wrap;
        }

        .sp-page-btn {
            height: 38px;
            min-width: 38px;
            padding: 0 14px;
            border-radius: 9px;
            border: 1.5px solid #D6E4F0;
            background: #fff;
            color: #1C2B3A;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: all .2s;
        }

        .sp-page-btn:hover:not(:disabled) {
            border-color: #148F77;
            color: #148F77;
        }

        .sp-page-btn.active {
            background: #148F77;
            border-color: #148F77;
            color: #fff;
            font-weight: 600;
        }

        .sp-page-btn:disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        /* ── Empty / Error State ─────────────────────────── */
        .sp-empty {
            text-align: center;
            padding: 80px 24px;
            color: #5D7285;
            font-family: 'DM Sans', sans-serif;
        }

        .sp-empty h3 {
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            color: #0F2942;
            margin: 16px 0 8px;
        }

        .sp-empty p {
            font-size: 14px;
            margin: 0 0 20px;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 640px) {
            .sp-filters-inner {
                gap: 8px;
            }

            .sp-sort-wrap {
                width: 100%;
                justify-content: flex-end;
            }

            .sp-select {
                font-size: 12px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="schools-page">

        {{-- ── Hero Bar ─────────────────────────────────────── --}}
        <div class="sp-hero">
            <div class="sp-hero-inner">
                <h1>{{ __('messages.nav.browse') }}</h1>
                <p>{{ __('messages.hero.subtitle') }}</p>
                <div class="sp-search-wrap">
                    <div class="sp-search-box">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <path d="M21 21l-4.35-4.35" />
                        </svg>
                        <input type="text" id="sp-search" placeholder="{{ __('messages.search.placeholder') }}"
                            autocomplete="off">
                    </div>
                    <button class="sp-search-btn" onclick="spSearch()">
                        {{ __('messages.search.btn') ?? 'Search' }}
                    </button>
                </div>
            </div>
        </div>

        {{-- ── Filter Bar ───────────────────────────────────── --}}
        <div class="sp-filters">
            <div class="sp-filters-inner">
                <select class="sp-select" id="sp-type" onchange="spApplyFilters()">
                    <option value="">{{ __('messages.search.type') }}</option>
                    <option value="British">British</option>
                    <option value="American">American</option>
                    <option value="German">German</option>
                    <option value="French">French</option>
                    <option value="IB World">IB World</option>
                    <option value="International">International</option>
                    <option value="Canadian">Canadian</option>
                    <option value="Montessori">Montessori</option>
                    <option value="Egyptian">Egyptian</option>
                </select>

                <select class="sp-select" id="sp-curriculum" onchange="spApplyFilters()">
                    <option value="">{{ __('messages.search.curriculum') }}</option>
                    <option value="IGCSE">IGCSE</option>
                    <option value="IB Diploma">IB Diploma</option>
                    <option value="American Diploma">American Diploma</option>
                    <option value="A-Levels">A-Levels</option>
                    <option value="Abitur">Abitur</option>
                    <option value="French Baccalaureate">French Baccalaureate</option>
                    <option value="Dogwood Diploma">Dogwood Diploma</option>
                    <option value="High School Diploma">High School Diploma</option>
                </select>

                <select class="sp-select" id="sp-location" onchange="spApplyFilters()">
                    <option value="">{{ __('messages.search.location') }}</option>
                    <option value="New Cairo">New Cairo</option>
                    <option value="Sheikh Zayed">Sheikh Zayed</option>
                    <option value="Maadi">Maadi</option>
                    <option value="6th of October">6th of October</option>
                    <option value="El-Shorouk">El-Shorouk</option>
                    <option value="Madinaty">Madinaty</option>
                    <option value="NewGiza">NewGiza</option>
                    <option value="Beverly Hills">Beverly Hills</option>
                    <option value="Giza">Giza</option>
                </select>

                <select class="sp-select" id="sp-fee" onchange="spApplyFilters()">
                    <option value="">{{ __('messages.search.fee_range') }}</option>
                    <option value="0,100000">{{ __('messages.search.fee_under_100') ?? 'Under E£100,000' }}</option>
                    <option value="100000,200000">{{ __('messages.search.fee_100_200') ?? 'E£100K – E£200K' }}</option>
                    <option value="200000,400000">{{ __('messages.search.fee_200_400') ?? 'E£200K – E£400K' }}</option>
                    <option value="400000,1200000">{{ __('messages.search.fee_400_plus') ?? 'E£400K+' }}</option>
                </select>

                <button class="sp-clear-btn" onclick="spClearFilters()">
                    {{ __('messages.search.clear_all') }}
                </button>

                <div class="sp-sort-wrap">
                    <label>{{ __('messages.search.sort_by') }}</label>
                    <select class="sp-select" id="sp-sort" onchange="spApplyFilters()">
                        <option value="">{{ __('messages.search.sort_default') }}</option>
                        <option value="name">{{ __('messages.search.sort_name') }}</option>
                        <option value="fee_low">{{ __('messages.search.sort_fee_low') }}</option>
                        <option value="fee_high">{{ __('messages.search.sort_fee_hi') }}</option>
                        <option value="rating">{{ __('messages.search.sort_rating') }}</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- ── Main Content ─────────────────────────────────── --}}
        <div class="sp-main">

            {{-- Results bar --}}
            <div class="sp-results-bar">
                <p class="sp-results-count" id="sp-count">
                    {{ __('messages.search.found') ?? 'Loading...' }}
                </p>
            </div>

            {{-- Grid --}}
            <div id="sp-grid" class="sp-grid"></div>

            {{-- Skeleton --}}
            <div id="sp-skeleton" class="sp-skeleton">
                @for($i = 0; $i < 12; $i++)
                    <div class="sk-card">
                        <div class="sk-line" style="height:20px;width:40%"></div>
                        <div class="sk-line" style="height:24px;width:85%"></div>
                        <div class="sk-line" style="height:14px;width:55%"></div>
                        <div class="sk-line" style="height:14px;width:70%"></div>
                        <div class="sk-line" style="height:22px;width:60%"></div>
                        <div class="sk-line" style="height:34px;width:100%"></div>
                    </div>
                @endfor
            </div>

            {{-- Empty state --}}
            <div id="sp-empty" class="sp-empty" style="display:none">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#D6E4F0" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
                <h3>{{ __('messages.search.no_results') }}</h3>
                <p>{{ __('messages.search.no_results_sub') }}</p>
                <button class="sp-search-btn" onclick="spClearFilters()">
                    {{ __('messages.search.clear_filters') }}
                </button>
            </div>

            {{-- Pagination --}}
            <div id="sp-pagination" class="sp-pagination" style="display:none"></div>

        </div>
    </div>

    @include('home.sections.school-modal')
    @include('home.sections.compare-modal')
    @include('partials.toast')
@endsection

@push('scripts')
    <script>
        /* ═══════════════════════════════════════
           SHARED CONFIG — required by school modal
           ═══════════════════════════════════════ */
        const API_BASE = '/api';
        const getToken = () => localStorage.getItem('sf_token');
        const authHeaders = () => {
            const h = { 'Accept': 'application/json', 'Content-Type': 'application/json' };
            if (getToken()) h['Authorization'] = 'Bearer ' + getToken();
            return h;
        };

        let lang = '{{ app()->getLocale() }}';
        let favs = JSON.parse(localStorage.getItem('sf_favs') || '[]');
        let cmps = [];
        let allData = [];
        let selStar = 0;

        const TR_SP = {
            en: {
                addFav: "Added to favorites ♥", remFav: "Removed from favorites",
                addCmp: "added to compare", remCmp: "Removed from compare",
                maxCmp: "Maximum 3 schools to compare", loginReq: "Please login to save favorites",
                viewBtn: "View Details →", cmpTitle: "Compare Schools",
                cmpEmpty: "Add schools using the compare button on each card.",
                selMore: "Select at least 2 schools to compare.",
                pickStar: "Please select a star rating first.",
                writeFirst: "Please write your review first.",
                apptSent: "Appointment request sent! ✓", revSent: "Review submitted! ✓",
                revTitle: "Parent Reviews", submitRev: "Submit Review",
                writeRev: "Write your review...", apptTitle: "Book Appointment",
                apptMsg: "Message (optional)", apptSend: "Send Request",
            },
            ar: {
                addFav: "تم الحفظ في المفضلة ♥", remFav: "تم الإزالة من المفضلة",
                addCmp: "أضيف للمقارنة", remCmp: "تم الإزالة من المقارنة",
                maxCmp: "الحد الأقصى 3 مدارس", loginReq: "سجل دخول لحفظ المفضلة",
                viewBtn: "عرض التفاصيل →", cmpTitle: "مقارنة المدارس",
                cmpEmpty: "أضف مدارس باستخدام زر المقارنة على كل بطاقة.",
                selMore: "اختر مدرستين على الأقل للمقارنة.",
                pickStar: "اختر عدد النجوم أولاً.",
                writeFirst: "اكتب تقييمك أولاً.",
                apptSent: "تم إرسال طلب الموعد! ✓", revSent: "تم إرسال التقييم! ✓",
                revTitle: "تقييمات أولياء الأمور", submitRev: "إرسال التقييم",
                writeRev: "اكتب تقييمك...", apptTitle: "حجز موعد",
                apptMsg: "رسالة (اختياري)", apptSend: "إرسال الطلب",
            }
        };
        const t = k => (TR_SP[lang] && TR_SP[lang][k]) || TR_SP.en[k] || k;

        /* ═══════════════════════════════════════
           SCHOOL MODAL FUNCTIONS
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
              <div style="font-size:.84rem;color:var(--muted);margin-bottom:.7rem">Only parents who have visited this school can submit a review.</div>
              <button class="sub-btn" onclick="window.location.href='/dashboard'" style="background:var(--warn);width:auto;padding:.45rem 1.4rem">Book Appointment →</button>
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
        function setStar(n) { selStar = n; for (let i = 1; i <= 5; i++) document.getElementById('st' + i).classList.toggle('on', i <= n); }
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

        function toggleCmp(id) {
            if (cmps.includes(id)) { cmps = cmps.filter(x => x !== id); toast(t('remCmp'), 'inf'); }
            else {
                if (cmps.length >= 3) { toast(t('maxCmp'), 'err'); return; }
                cmps.push(id);
                toast(`${t('addCmp')}`, 'ok');
            }
            updateCBar();
        }
        function clearCmp() { cmps = []; updateCBar(); }
        function updateCBar() {
            const bar = document.getElementById('cbar'), items = document.getElementById('cbitems');
            if (!bar || !items) return;
            items.innerHTML = cmps.map(id => `<div class="ci">School<span class="cir" onclick="toggleCmp(${id})">✕</span></div>`).join('');
            bar.classList.toggle('on', cmps.length > 0);
        }
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
                schools = [];
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
            const html = `<div style="overflow-x:auto"><table style="width:100%;border-collapse:collapse;font-size:.84rem;min-width:500px">
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

        let ttimer;
        function toast(msg, type = 'inf') {
            const el = document.getElementById('toast');
            if (!el) return;
            el.textContent = msg; el.className = `toast show ${type}`;
            clearTimeout(ttimer);
            ttimer = setTimeout(() => el.className = 'toast', 2500);
        }

        // ── State ─────────────────────────────────────────────────────────────────────
        const SP = {
            page: 1,
            perPage: 12,
            total: 0,
            lastPage: 1,
            loading: false,
            search: '',
            type: '',
            curriculum: '',
            location: '',
            feeMin: '',
            feeMax: '',
            sort: '',
        };

        // ── Init ──────────────────────────────────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', () => {
            // Read query string if any (e.g. ?type=British from homepage type card click)
            const params = new URLSearchParams(window.location.search);
            if (params.get('type')) { SP.type = params.get('type'); document.getElementById('sp-type').value = SP.type; }
            if (params.get('search')) { SP.search = params.get('search'); document.getElementById('sp-search').value = SP.search; }
            if (params.get('curriculum')) { SP.curriculum = params.get('curriculum'); document.getElementById('sp-curriculum').value = SP.curriculum; }
            if (params.get('location')) { SP.location = params.get('location'); document.getElementById('sp-location').value = SP.location; }
            if (params.get('sort')) { SP.sort = params.get('sort'); document.getElementById('sp-sort').value = SP.sort; }

            spLoad();

            // Search on Enter key
            document.getElementById('sp-search').addEventListener('keydown', e => {
                if (e.key === 'Enter') spSearch();
            });
        });

        // ── Load schools from API ─────────────────────────────────────────────────────
        function spLoad() {
            if (SP.loading) return;
            SP.loading = true;

            document.getElementById('sp-skeleton').style.display = 'grid';
            document.getElementById('sp-grid').innerHTML = '';
            document.getElementById('sp-empty').style.display = 'none';
            document.getElementById('sp-pagination').style.display = 'none';

            const params = new URLSearchParams({
                page: SP.page,
                per_page: SP.perPage,
                ...(SP.search && { search: SP.search }),
                ...(SP.type && { type: SP.type }),
                ...(SP.curriculum && { curriculum: SP.curriculum }),
                ...(SP.location && { location: SP.location }),
                ...(SP.feeMin && { fee_min: SP.feeMin }),
                ...(SP.feeMax && { fee_max: SP.feeMax }),
                ...(SP.sort && { sort: SP.sort }),
            });

            fetch(`/api/schools?${params}`, {
                headers: { 'Accept': 'application/json' }
            })
                .then(r => r.json())
                .then(res => {
                    SP.loading = false;
                    document.getElementById('sp-skeleton').style.display = 'none';

                    if (!res.success) { spShowError(); return; }

                    SP.total = res.meta?.total ?? 0;
                    SP.lastPage = res.meta?.last_page ?? 1;

                    spUpdateCount();

                    if (!res.data || res.data.length === 0) {
                        document.getElementById('sp-empty').style.display = 'block';
                        return;
                    }

                    spRenderCards(res.data);
                    spRenderPagination();
                })
                .catch(() => {
                    SP.loading = false;
                    document.getElementById('sp-skeleton').style.display = 'none';
                    spShowError();
                });
        }

        // ── Render school cards ───────────────────────────────────────────────────────
        function spRenderCards(schools) {
            const grid = document.getElementById('sp-grid');
            grid.innerHTML = '';

            schools.forEach(s => {
                const fee = s.feeDisplay
                    ? `<div class="sc-fee">${s.feeDisplay} <span>/ {{ __('messages.card.per_year') }}</span></div>`
                    : `<div class="sc-fee" style="color:#5D7285;font-size:14px">{{ __('messages.modal.fees') ?? 'Fees on request' }}</div>`;

                const curricula = (s.curricula || [])
                    .slice(0, 3)
                    .map(c => `<span class="sc-tag">${c}</span>`)
                    .join('');

                const rating = s.rating
                    ? `<span class="star">★</span> ${s.rating} (${s.reviewCount})`
                    : `<span class="star">★</span> — (0)`;

                grid.insertAdjacentHTML('beforeend', `
                <div class="school-card" onclick="spOpenSchool(${s.id})">
                    <div class="sc-top">
                        <span class="sc-type-badge">${s.type ?? ''}</span>
                        <div class="sc-actions" onclick="event.stopPropagation()">
                            <button class="sc-action-btn" id="fav-${s.id}" onclick="spToggleFav(${s.id})" title="{{ __('messages.card.save') }}">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                </svg>
                            </button>
                            <button class="sc-action-btn" onclick="spAddCompare(${s.id})" title="{{ __('messages.card.compare') }}">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/>
                                    <line x1="6" y1="20" x2="6" y2="14"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="sc-name">${s.name}</p>
                        <div class="sc-location">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                            ${s.area ?? s.location ?? ''}
                        </div>
                    </div>
                    <div class="sc-curricula">${curricula}</div>
                    ${fee}
                    <div class="sc-footer">
                        <div class="sc-rating">${rating}</div>
                        <button class="sc-view-btn">{{ __('messages.card.view') }}</button>
                    </div>
                </div>
            `);
            });

            // Restore favorites state if token exists
            const token = localStorage.getItem('sf_token');
            if (token) spRestoreFavs(schools.map(s => s.id));
        }

        // ── Pagination ────────────────────────────────────────────────────────────────
        function spRenderPagination() {
            if (SP.lastPage <= 1) return;
            const wrap = document.getElementById('sp-pagination');
            wrap.style.display = 'flex';
            wrap.innerHTML = '';

            const prev = document.createElement('button');
            prev.className = 'sp-page-btn';
            prev.textContent = '← ' + '{{ __('messages.login.nav_back') ?? 'Prev' }}'.replace('← Back to Schools', 'Prev');
            prev.disabled = SP.page <= 1;
            prev.onclick = () => { SP.page--; spLoad(); window.scrollTo({ top: 0, behavior: 'smooth' }); };
            wrap.appendChild(prev);

            // Page numbers
            const range = spPageRange(SP.page, SP.lastPage);
            range.forEach(p => {
                const btn = document.createElement('button');
                btn.className = 'sp-page-btn' + (p === SP.page ? ' active' : '');
                btn.textContent = p === '...' ? '…' : p;
                btn.disabled = p === '...';
                btn.onclick = () => { if (p !== '...') { SP.page = p; spLoad(); window.scrollTo({ top: 0, behavior: 'smooth' }); } };
                wrap.appendChild(btn);
            });

            const next = document.createElement('button');
            next.className = 'sp-page-btn';
            next.textContent = '{!! __('messages.search.next') ?? 'Next →' !!}';
            next.disabled = SP.page >= SP.lastPage;
            next.onclick = () => { SP.page++; spLoad(); window.scrollTo({ top: 0, behavior: 'smooth' }); };
            wrap.appendChild(next);
        }

        function spPageRange(current, last) {
            if (last <= 7) return Array.from({ length: last }, (_, i) => i + 1);
            if (current <= 4) return [1, 2, 3, 4, 5, '...', last];
            if (current >= last - 3) return [1, '...', last - 4, last - 3, last - 2, last - 1, last];
            return [1, '...', current - 1, current, current + 1, '...', last];
        }

        // ── Count label ───────────────────────────────────────────────────────────────
        function spUpdateCount() {
            document.getElementById('sp-count').innerHTML =
                `<strong>${SP.total}</strong> {{ __('messages.search.found') }}`;
        }

        // ── Filters ───────────────────────────────────────────────────────────────────
        function spSearch() {
            SP.search = document.getElementById('sp-search').value.trim();
            SP.page = 1;
            spLoad();
        }

        function spApplyFilters() {
            SP.type = document.getElementById('sp-type').value;
            SP.curriculum = document.getElementById('sp-curriculum').value;
            SP.location = document.getElementById('sp-location').value;
            SP.sort = document.getElementById('sp-sort').value;
            SP.feeMin = '';
            SP.feeMax = '';
            const feeVal = document.getElementById('sp-fee').value;
            if (feeVal) { const [mn, mx] = feeVal.split(','); SP.feeMin = mn; SP.feeMax = mx; }
            SP.page = 1;
            spLoad();
        }

        function spClearFilters() {
            SP.search = ''; SP.type = ''; SP.curriculum = ''; SP.location = '';
            SP.feeMin = ''; SP.feeMax = ''; SP.sort = ''; SP.page = 1;
            document.getElementById('sp-search').value = '';
            document.getElementById('sp-type').value = '';
            document.getElementById('sp-curriculum').value = '';
            document.getElementById('sp-location').value = '';
            document.getElementById('sp-fee').value = '';
            document.getElementById('sp-sort').value = '';
            spLoad();
        }

        // ── School actions ────────────────────────────────────────────────────────────
        function spOpenSchool(id) {
            openSch(id);
        }

        function spToggleFav(id) {
            const token = localStorage.getItem('sf_token');
            if (!token) { sfAlert && sfAlert('{{ __("messages.card.login_req") }}', 'warning'); return; }
            const btn = document.getElementById('fav-' + id);
            const isActive = btn.classList.contains('active');
            const method = isActive ? 'DELETE' : 'POST';
            fetch(`/api/favorites/${id}`, {
                method,
                headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
            })
                .then(r => r.json())
                .then(res => {
                    if (res.success) {
                        btn.classList.toggle('active');
                        sfAlert && sfAlert(isActive ? '{{ __("messages.success.fav_removed") }}' : '{{ __("messages.success.fav_added") }}', 'success');
                    }
                });
        }

        function spRestoreFavs(ids) {
            const token = localStorage.getItem('sf_token');
            if (!token) return;
            fetch('/api/favorites', { headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(res => {
                    if (!res.success) return;
                    const favIds = (res.data || []).map(s => s.id);
                    favIds.forEach(id => {
                        const btn = document.getElementById('fav-' + id);
                        if (btn) btn.classList.add('active');
                    });
                });
        }

        function spAddCompare(id) {
            toggleCmp(id);
        }

        function spShowError() {
            document.getElementById('sp-grid').innerHTML = `
            <div class="sp-empty" style="grid-column:1/-1">
                <h3>{{ __('messages.errors.network') }}</h3>
                <p>{{ __('messages.search.no_results_sub') }}</p>
                <button class="sp-search-btn" onclick="spLoad()">{{ __('messages.search.clear_filters') }}</button>
            </div>`;
        }
    </script>
@endpush
