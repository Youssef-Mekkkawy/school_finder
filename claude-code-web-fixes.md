# SchoolFinder Egypt — Web Fixes & Features
# Claude Code Task File

## ═══════════════════════════════════════════════════════════
## ABSOLUTE RULES — READ BEFORE DOING ANYTHING
## ═══════════════════════════════════════════════════════════

- NEVER change any CSS, colors, design, spacing, fonts, or visual styles
- NEVER change class names, IDs, or HTML structure of existing elements
- NEVER modify files not listed in each task
- If you need to add new UI (modal, page, section) — match EXACTLY the existing design:
  - Colors: --navy: #0F2942, --blue: #1A5276, --teal: #148F77, --border: #D6E4F0
  - Fonts: Sora (headings), DM Sans (body)
  - Border radius: 14px for cards, 10px for inputs
  - Same button styles, same card styles as existing pages
- After every task, verify PHP/Blade/JS syntax is valid
- Do not add features not mentioned — only fix what is listed

---

## ═══════════════════════════════════════════════════════════
## TASK 1 — Fix school modal on /schools page
## ═══════════════════════════════════════════════════════════

### Problem
The school detail modal (openSch function + schMod HTML) and compare modal
live in `resources/views/home/sections/school-modal.blade.php` and
`resources/views/home/sections/compare-modal.blade.php` — included only on
homepage. The /schools page calls openSch(id) but modal HTML does not exist
there — it crashes.

### Fix

**Step 1 — Read these files carefully:**
- `resources/views/home/sections/school-modal.blade.php`
- `resources/views/home/sections/compare-modal.blade.php`
- `resources/views/home/index.blade.php`
- `resources/views/schools/index.blade.php`

**Step 2 — Include modals in schools/index.blade.php.**

Find the `@endsection` that closes the content section in
`resources/views/schools/index.blade.php` and add BEFORE it:

```blade
    @include('home.sections.school-modal')
    @include('home.sections.compare-modal')
    @include('partials.toast')
```

**Step 3 — Add required shared JS to schools page.**

In `resources/views/schools/index.blade.php`, inside `@push('scripts')`,
add this block BEFORE the existing `const SP = {` state object:

```javascript
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
    }
};
const t = k => (TR_SP[lang] && TR_SP[lang][k]) || TR_SP.en[k] || k;
```

**Step 4 — Replace the spOpenSchool function.**

Find:
```javascript
function spOpenSchool(id) {
    // Delegate to existing showSchoolModal if it exists (from home page JS)
    if (typeof showSchoolModal === 'function') {
        showSchoolModal(id);
    } else {
        window.dispatchEvent(new CustomEvent('openSchool', { detail: { id } }));
    }
}
```

Replace with:
```javascript
function spOpenSchool(id) {
    openSch(id);
}
```

**Step 5 — Copy these functions from home/index.blade.php to schools/index.blade.php.**

Read home/index.blade.php and find then copy these exact functions:
- `openSch(id)` — the main school modal loader
- `mr(label, value)` — helper for modal rows
- `toggleFav(id)` — favorite toggle
- `toggleCmp(id)` — compare toggle
- `clearCmp()` — clear compare list
- `updateCBar()` — update compare bar UI
- `showCmpModal()` — show compare modal
- `toast(msg, type)` — toast notification (if not already in partials/toast)
- Any other functions that openSch() depends on

Copy them AFTER the TR_SP block and BEFORE the SP = { state block.

---

## ═══════════════════════════════════════════════════════════
## TASK 2 — Fix @auth in nav (CSRF + session)
## ═══════════════════════════════════════════════════════════

### Problem
Nav uses @auth/@guest Blade directives requiring Laravel web session.
Login creates an API token but the session call may fail if CSRF token is missing.
Also, the homepage `initNav()` JS function conflicts with @auth nav.

### Fix

**Step 1 — Add CSRF meta tag to login blade if missing.**

File: `resources/views/auth/login.blade.php`

Find `<head>` and add inside it if not already present:
```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```

**Step 2 — Verify login.js calls /auth/session after login.**

Open `public/js/login.js` and check submitLogin() function.
It should already contain this after localStorage.setItem("sf_token"):
```javascript
const sessionEndpoint = selectedRole === 'admin'
    ? '/auth/admin-session'
    : '/auth/session';
await fetch(sessionEndpoint, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '',
        'Accept': 'application/json',
    },
    body: JSON.stringify({ email, password: pass }),
});
```

If it is already there — do nothing.
If it is missing — add it after the localStorage.setItem('sf_token', ...) line.

**Step 3 — Remove initNav() from homepage.**

File: `resources/views/home/index.blade.php`

Find and DELETE the entire `initNav()` function definition and its call.
The nav.blade.php already handles auth display via @auth/@guest — initNav() conflicts.

KEEP these functions (do NOT delete):
- `doLogoutNav()` — still needed for the logout button
- `toggleUserMenu(e)` — still needed for dropdown behavior
- The `document.addEventListener('click', ...)` that closes dropdown

**Step 4 — In nav.blade.php, the @auth user menu block needs the avatar initials.**

File: `resources/views/partials/nav.blade.php`

The avatar circle should show the user's initials from Blade, not from JS.
Find the avatar circle element and make sure it contains:
```blade
{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
```

This is already done if you previously updated nav.blade.php.
If not — update it now.

---

## ═══════════════════════════════════════════════════════════
## TASK 3 — Connect user dashboard to real API
## ═══════════════════════════════════════════════════════════

### Problem
`resources/views/user/dashboard.blade.php` loads `public/js/user.js`.
Need to verify all API calls are correct and working.

### Fix

**Step 1 — Read `public/js/user.js` completely.**

**Step 2 — Verify each section calls the correct endpoint with auth header.**

Required endpoints in user.js:

```
GET  /api/auth/me                          → load user name, email, member since
GET  /api/favorites                        → load favorites tab
GET  /api/user/reviews                     → load reviews tab
GET  /api/appointments                     → load appointments tab
GET  /api/notifications                    → load notifications tab
GET  /api/notifications/unread-count       → badge count
PUT  /api/notifications/{id}/read          → mark single read
PUT  /api/notifications/read-all           → mark all read
PUT  /api/appointments/{id}/cancel         → cancel appointment
PUT  /api/auth/profile                     → save profile changes
PUT  /api/auth/password                    → change password
```

**Step 3 — Fix any missing or wrong endpoint calls.**

**Step 4 — Make sure every fetch() call includes:**
```javascript
headers: {
    'Authorization': 'Bearer ' + localStorage.getItem('sf_token'),
    'Accept': 'application/json',
    'Content-Type': 'application/json',
}
```

**Step 5 — Add token check at init if missing:**
```javascript
const token = localStorage.getItem('sf_token');
if (!token) { window.location.href = '/login'; return; }
```

**Step 6 — Do NOT change any HTML or CSS in dashboard.blade.php.**

---

## ═══════════════════════════════════════════════════════════
## TASK 4 — Connect admin dashboard to real API
## ═══════════════════════════════════════════════════════════

### Fix

**Step 1 — Read `resources/views/admin/dashboard.blade.php`**
and find which JS file it loads.

**Step 2 — Read that admin JS file completely.**

**Step 3 — Verify these API calls exist and are correct:**

```
GET    /api/admin/stats                         → dashboard stats cards
GET    /api/admin/schools                       → schools list
POST   /api/admin/schools                       → create school
PUT    /api/admin/schools/{id}                  → update school
DELETE /api/admin/schools/{id}                  → delete school
PUT    /api/admin/schools/{id}/set-featured     → set school of month
PUT    /api/admin/schools/{id}/remove-featured  → remove featured
GET    /api/admin/reviews                        → reviews list
PUT    /api/admin/reviews/{id}/approve           → approve review
DELETE /api/admin/reviews/{id}                   → delete review
GET    /api/admin/appointments                   → appointments list
PUT    /api/admin/appointments/{id}/status       → update status (body: {status, ...})
DELETE /api/admin/appointments/{id}              → delete appointment
GET    /api/admin/users                          → users list
DELETE /api/admin/users/{id}                     → delete user
POST   /api/admin/notifications/send             → send notification
GET    /api/admin/homepage                       → get homepage settings
POST   /api/admin/homepage/{section}             → update homepage section
```

**Step 4 — Fix any missing or wrong API calls.**

**Step 5 — Add token check at init:**
```javascript
const token = localStorage.getItem('sf_token');
if (!token) { window.location.href = '/login'; return; }
```

**Step 6 — Do NOT change any HTML or CSS.**

---

## ═══════════════════════════════════════════════════════════
## TASK 5 — Arabic RTL layout fixes
## ═══════════════════════════════════════════════════════════

### Fix

**Step 1 — Read `public/css/app.css` completely.**

**Step 2 — Append these RTL overrides at the very END of app.css.**
Do NOT modify any existing rules:

```css
/* ═══════════════════════════════
   RTL OVERRIDES (Arabic)
   ═══════════════════════════════ */
[dir="rtl"] .nav-links { flex-direction: row-reverse; }
[dir="rtl"] .nav-act { flex-direction: row-reverse; }
[dir="rtl"] .nav-i { flex-direction: row-reverse; }

[dir="rtl"] .hero-content { text-align: right; }
[dir="rtl"] .search-row { flex-direction: row-reverse; }
[dir="rtl"] .filter-row { flex-direction: row-reverse; }

[dir="rtl"] .type-card { text-align: center; }
[dir="rtl"] .school-card { text-align: right; }
[dir="rtl"] .sc-top { flex-direction: row-reverse; }
[dir="rtl"] .sc-actions { flex-direction: row-reverse; }
[dir="rtl"] .sc-location { flex-direction: row-reverse; }
[dir="rtl"] .sc-footer { flex-direction: row-reverse; }
[dir="rtl"] .sc-curricula { flex-direction: row-reverse; }

[dir="rtl"] .sp-filters-inner { flex-direction: row-reverse; }
[dir="rtl"] .sp-sort-wrap { margin-left: unset; margin-right: auto; flex-direction: row-reverse; }
[dir="rtl"] .sp-search-box svg { left: unset; right: 14px; }
[dir="rtl"] .sp-search-box input { padding: 0 42px 0 16px; }

[dir="rtl"] .sp-results-bar { flex-direction: row-reverse; }

[dir="rtl"] input,
[dir="rtl"] select,
[dir="rtl"] textarea { text-align: right; }

[dir="rtl"] .modal-header { flex-direction: row-reverse; }
[dir="rtl"] .modal-row { flex-direction: row-reverse; }

[dir="rtl"] .footer-cols { direction: rtl; }
[dir="rtl"] .footer-col { text-align: right; }
```

**Step 3 — Read `public/css/user.css` and append RTL overrides at end:**

```css
/* ═══════════════════════════════
   RTL OVERRIDES (Arabic)
   ═══════════════════════════════ */
[dir="rtl"] .layout { flex-direction: row-reverse; }
[dir="rtl"] .nav-i { flex-direction: row-reverse; }
[dir="rtl"] .nav-right { flex-direction: row-reverse; }
[dir="rtl"] .sidebar { border-right: none; border-left: 1px solid var(--border, #D6E4F0); }
[dir="rtl"] .sb-item { flex-direction: row-reverse; text-align: right; }
[dir="rtl"] .sb-badge { margin-left: unset; margin-right: auto; }
[dir="rtl"] .user-card { text-align: center; }
[dir="rtl"] .tab-header { flex-direction: row-reverse; }
[dir="rtl"] .card-row { flex-direction: row-reverse; }
[dir="rtl"] .appt-item { text-align: right; }
[dir="rtl"] .notif-item { flex-direction: row-reverse; text-align: right; }
[dir="rtl"] .form-group label { text-align: right; display: block; }
[dir="rtl"] input,
[dir="rtl"] select,
[dir="rtl"] textarea { text-align: right; }
```

**Note:** Only add overrides for classes that actually exist in these CSS files.
Read the files first and only add [dir="rtl"] rules for real class names.

---

## ═══════════════════════════════════════════════════════════
## TASK 6 — Compare dedicated page
## ═══════════════════════════════════════════════════════════

### Fix

**Step 1 — Add route to routes/web.php** (in the PUBLIC PAGES section):
```php
Route::get('/compare', function () {
    return view('schools.compare');
})->name('schools.compare');
```

**Step 2 — Create `resources/views/schools/compare.blade.php`.**

Requirements:
- `@extends('layouts.app')`
- Reads `?ids[]=1&ids[]=2&ids[]=3` from URL query string via JS
- Fetches from `GET /api/schools/compare?ids[]=1&ids[]=2`
- Shows school cards at top (one per school being compared)
- Shows comparison table below with: Type, Location, Curricula, Fees,
  Age Range, Class Size, Rating, Transport
- "← Back to Schools" link that goes to {{ route('schools.index') }}
- Uses EXACT same CSS variables and design as the rest of the site:
  same fonts (Sora/DM Sans), same colors (#0F2942, #148F77, #D6E4F0)
  same card border-radius (14px), same button styles
- Supports Arabic RTL (use `dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"` on html already in layout)
- Include `@include('partials.toast')` for notifications
- Show a loading state while fetching
- Show "No schools selected" if no ids in URL

**Step 3 — The compare bar on homepage and schools page** should keep working
as-is (modal still works). No changes needed there.

---

## ═══════════════════════════════════════════════════════════
## FINAL VERIFICATION
## ═══════════════════════════════════════════════════════════

After completing all tasks:

```bash
php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan serve
```

Test each fix:
1. /schools → click any school card → modal opens ✓
2. Login as omar@test.com → nav shows user avatar ✓
3. Refresh any page while logged in → nav still shows user avatar ✓
4. /dashboard → real data loads (favorites, appointments, etc.) ✓
5. /admin → login as admin@schoolfinder.com → stats load ✓
6. Switch to Arabic → layout flips RTL properly ✓
7. /compare?ids[]=8&ids[]=15 → comparison table renders ✓

Report any errors found and fix them.
