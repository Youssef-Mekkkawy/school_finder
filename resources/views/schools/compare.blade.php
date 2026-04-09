@extends('layouts.app')

@section('title', 'Compare Schools — SchoolFinder Egypt')

@push('styles')
<style>
    /* ── Page Layout ─────────────────────────────── */
    .cmp-page {
        min-height: 100vh;
        background: var(--bg, #F7FAFD);
        padding-bottom: 80px;
    }

    /* ── Hero Bar ────────────────────────────────── */
    .cmp-hero {
        background: #0F2942;
        padding: 36px 0 32px;
    }
    .cmp-hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }
    .cmp-hero h1 {
        font-family: 'Sora', sans-serif;
        font-size: clamp(20px, 3vw, 28px);
        font-weight: 700;
        color: #fff;
        margin: 0;
        flex: 1;
    }
    .cmp-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 38px;
        padding: 0 18px;
        background: rgba(255,255,255,.1);
        color: #fff;
        border: 1.5px solid rgba(255,255,255,.2);
        border-radius: 10px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: background .2s;
        white-space: nowrap;
    }
    .cmp-back-btn:hover { background: rgba(255,255,255,.18); }

    /* ── Main Content ────────────────────────────── */
    .cmp-main {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px 24px 0;
    }

    /* ── School Cards Row ────────────────────────── */
    .cmp-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 16px;
        margin-bottom: 32px;
    }
    .cmp-card {
        background: #fff;
        border-radius: 14px;
        border: 1.5px solid #D6E4F0;
        padding: 20px;
        text-align: center;
    }
    .cmp-card-name {
        font-family: 'Sora', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: #0F2942;
        margin: 0 0 6px;
        line-height: 1.35;
    }
    .cmp-card-type {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        padding: 3px 10px;
        border-radius: 20px;
        background: #F0F6FF;
        color: #1A5276;
        margin-bottom: 8px;
    }
    .cmp-card-loc {
        font-size: 13px;
        color: #5D7285;
        font-family: 'DM Sans', sans-serif;
    }
    .cmp-card-fee {
        font-family: 'Sora', sans-serif;
        font-size: 16px;
        font-weight: 800;
        color: #0F2942;
        margin-top: 10px;
    }
    .cmp-card-fee span {
        font-size: 11px;
        font-weight: 400;
        color: #5D7285;
        font-family: 'DM Sans', sans-serif;
    }

    /* ── Comparison Table ────────────────────────── */
    .cmp-table-wrap {
        background: #fff;
        border-radius: 14px;
        border: 1.5px solid #D6E4F0;
        overflow: hidden;
        overflow-x: auto;
    }
    .cmp-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        min-width: 500px;
    }
    .cmp-table thead th {
        padding: 14px 18px;
        text-align: left;
        background: #F7FAFD;
        font-family: 'Sora', sans-serif;
        font-size: 13px;
        font-weight: 700;
        color: #0F2942;
        border-bottom: 2px solid #148F77;
    }
    .cmp-table thead th:first-child {
        color: #5D7285;
        font-weight: 600;
        border-bottom: 2px solid #D6E4F0;
    }
    .cmp-table tbody td {
        padding: 12px 18px;
        color: #1C2B3A;
        border-bottom: 1px solid #D6E4F0;
        vertical-align: top;
    }
    .cmp-table tbody td:first-child {
        color: #5D7285;
        font-weight: 600;
        font-size: 13px;
        white-space: nowrap;
    }
    .cmp-table tbody tr:last-child td { border-bottom: none; }
    .cmp-table tbody tr:nth-child(even) td { background: #F8FAFF; }

    /* ── Rating stars ────────────────────────────── */
    .cmp-star { color: #F39C12; }

    /* ── Loading / Empty States ──────────────────── */
    .cmp-loading, .cmp-empty {
        text-align: center;
        padding: 80px 24px;
        color: #5D7285;
        font-family: 'DM Sans', sans-serif;
    }
    .cmp-loading h3, .cmp-empty h3 {
        font-family: 'Sora', sans-serif;
        font-size: 20px;
        color: #0F2942;
        margin: 16px 0 8px;
    }
    .cmp-loading p, .cmp-empty p { font-size: 14px; margin: 0 0 20px; }
    .cmp-spinner {
        width: 40px; height: 40px;
        border: 3px solid #D6E4F0;
        border-top-color: #148F77;
        border-radius: 50%;
        animation: spin .8s linear infinite;
        margin: 0 auto 16px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    /* ── Responsive ──────────────────────────────── */
    @media (max-width: 640px) {
        .cmp-hero-inner { flex-direction: column; align-items: flex-start; gap: 12px; }
        .cmp-table thead th, .cmp-table tbody td { padding: 10px 12px; font-size: 13px; }
    }

    /* ── RTL ─────────────────────────────────────── */
    [dir="rtl"] .cmp-hero-inner { flex-direction: row-reverse; }
    [dir="rtl"] .cmp-table thead th,
    [dir="rtl"] .cmp-table tbody td { text-align: right; }
</style>
@endpush

@section('content')
<div class="cmp-page">

    {{-- ── Hero Bar ──────────────────────────────── --}}
    <div class="cmp-hero">
        <div class="cmp-hero-inner">
            <h1 id="cmp-title">
                {{ app()->getLocale() === 'ar' ? 'مقارنة المدارس' : 'Compare Schools' }}
            </h1>
            <a href="{{ route('schools.index') }}" class="cmp-back-btn">
                ← {{ app()->getLocale() === 'ar' ? 'العودة للمدارس' : 'Back to Schools' }}
            </a>
        </div>
    </div>

    {{-- ── Main Content ───────────────────────────── --}}
    <div class="cmp-main">

        {{-- Loading --}}
        <div id="cmp-loading" class="cmp-loading">
            <div class="cmp-spinner"></div>
            <h3>{{ app()->getLocale() === 'ar' ? 'جاري التحميل...' : 'Loading...' }}</h3>
        </div>

        {{-- No schools selected --}}
        <div id="cmp-empty" class="cmp-empty" style="display:none">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#D6E4F0" stroke-width="1.5">
                <line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="14"/>
            </svg>
            <h3>{{ app()->getLocale() === 'ar' ? 'لم يتم اختيار مدارس' : 'No schools selected' }}</h3>
            <p>{{ app()->getLocale() === 'ar' ? 'أضف مدارس من صفحة البحث للمقارنة.' : 'Add schools from the search page to compare.' }}</p>
            <a href="{{ route('schools.index') }}" class="cmp-back-btn" style="display:inline-flex;margin:0 auto">
                {{ app()->getLocale() === 'ar' ? 'تصفح المدارس' : 'Browse Schools' }}
            </a>
        </div>

        {{-- Results --}}
        <div id="cmp-results" style="display:none">
            {{-- School header cards --}}
            <div id="cmp-cards" class="cmp-cards"></div>
            {{-- Comparison table --}}
            <div class="cmp-table-wrap">
                <table class="cmp-table">
                    <thead id="cmp-thead"><tr></tr></thead>
                    <tbody id="cmp-tbody"></tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@include('partials.toast')
@endsection

@push('scripts')
<script>
    const CMP_LANG = '{{ app()->getLocale() }}';
    const CMP_L    = CMP_LANG === 'ar';

    const CMP_LABELS = {
        feature:    CMP_L ? 'الخاصية'           : 'Feature',
        type:       CMP_L ? 'النوع'              : 'Type',
        location:   CMP_L ? 'الموقع'             : 'Location',
        curricula:  CMP_L ? 'المناهج'            : 'Curricula',
        fees:       CMP_L ? 'المصاريف'           : 'Fees',
        age_range:  CMP_L ? 'الفئة العمرية'      : 'Age Range',
        class_size: CMP_L ? 'حجم الفصل'          : 'Class Size',
        rating:     CMP_L ? 'التقييم'            : 'Rating',
        transport:  CMP_L ? 'المواصلات'          : 'Transport',
        per_year:   CMP_L ? 'سنوياً'             : 'per year',
        yrs:        CMP_L ? 'سنة'               : 'yrs',
        na:         'N/A',
        none:       '—',
        reviews:    CMP_L ? 'تقييم'              : 'reviews',
    };

    /* ═══════════════════════════════════════
       INIT
       ═══════════════════════════════════════ */
    document.addEventListener('DOMContentLoaded', () => {
        const params  = new URLSearchParams(window.location.search);
        const ids     = params.getAll('ids[]');

        if (!ids.length) {
            document.getElementById('cmp-loading').style.display = 'none';
            document.getElementById('cmp-empty').style.display   = 'block';
            return;
        }

        const query = ids.map(id => `ids[]=${id}`).join('&');
        const token = localStorage.getItem('sf_token');
        const headers = { 'Accept': 'application/json', 'Content-Type': 'application/json' };
        if (token) headers['Authorization'] = 'Bearer ' + token;

        fetch(`/api/schools/compare?${query}`, { headers })
            .then(r => r.json())
            .then(json => {
                document.getElementById('cmp-loading').style.display = 'none';
                const schools = json.data || [];
                if (!schools.length) {
                    document.getElementById('cmp-empty').style.display = 'block';
                    return;
                }
                renderCompare(schools);
                document.getElementById('cmp-results').style.display = 'block';
            })
            .catch(() => {
                document.getElementById('cmp-loading').style.display = 'none';
                document.getElementById('cmp-empty').style.display   = 'block';
            });
    });

    /* ═══════════════════════════════════════
       RENDER
       ═══════════════════════════════════════ */
    function renderCompare(schools) {
        /* ── School header cards ── */
        const cardsEl = document.getElementById('cmp-cards');
        cardsEl.innerHTML = schools.map(s => {
            const loc = s.location ? (s.location.area || '') + (s.location.city ? ', ' + s.location.city : '') : (s.area || CMP_LABELS.none);
            return `
            <div class="cmp-card">
                <div class="cmp-card-type">${s.type || CMP_LABELS.none}</div>
                <p class="cmp-card-name">${s.name}</p>
                <div class="cmp-card-loc">📍 ${loc}</div>
                ${s.feeDisplay
                    ? `<div class="cmp-card-fee">${s.feeDisplay} <span>/ ${CMP_LABELS.per_year}</span></div>`
                    : `<div class="cmp-card-fee" style="color:#5D7285;font-size:13px">${CMP_LABELS.none}</div>`}
            </div>`;
        }).join('');

        /* ── Table header ── */
        const thead = document.getElementById('cmp-thead').querySelector('tr');
        thead.innerHTML =
            `<th>${CMP_LABELS.feature}</th>` +
            schools.map(s => `<th>${s.name}</th>`).join('');

        /* ── Table rows ── */
        const rows = [
            { label: CMP_LABELS.type,       val: s => s.type || CMP_LABELS.none },
            { label: CMP_LABELS.location,   val: s => {
                const loc = s.location ? (s.location.area || '') + (s.location.city ? ', ' + s.location.city : '') : (s.area || CMP_LABELS.none);
                return loc || CMP_LABELS.none;
            }},
            { label: CMP_LABELS.curricula,  val: s => (s.curricula || []).join(', ') || CMP_LABELS.none },
            { label: CMP_LABELS.fees,        val: s => s.feeDisplay || CMP_LABELS.none },
            { label: CMP_LABELS.age_range,   val: s => (s.age_min || s.age_max) ? `${s.age_min || '?'}–${s.age_max || '?'} ${CMP_LABELS.yrs}` : CMP_LABELS.na },
            { label: CMP_LABELS.class_size,  val: s => s.class_size_avg ? `~${s.class_size_avg}` : CMP_LABELS.na },
            { label: CMP_LABELS.rating,      val: s => s.rating != null ? `<span class="cmp-star">★</span> ${s.rating} (${s.reviewCount || 0} ${CMP_LABELS.reviews})` : CMP_LABELS.none },
            { label: CMP_LABELS.transport,   val: s => s.transport || CMP_LABELS.none },
        ];

        const tbody = document.getElementById('cmp-tbody');
        tbody.innerHTML = rows.map(row =>
            `<tr>
                <td>${row.label}</td>
                ${schools.map(s => `<td>${row.val(s)}</td>`).join('')}
            </tr>`
        ).join('');
    }
</script>
@endpush
