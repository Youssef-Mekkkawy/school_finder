/* ── Token expiry check (async) ── */
(function () {
    const token = localStorage.getItem("sf_token");
    if (!token) return;
    fetch("/api/auth/me", {
        headers: {
            Authorization: "Bearer " + token,
            Accept: "application/json",
        },
    }).then((r) => {
        if (r.status === 401) {
            localStorage.removeItem("sf_token");
            window.location.replace("/login");
        }
    });
})();

/* ═══════════════════════════════════════
           DATA
           ═══════════════════════════════════════ */
let MY_FAVS = [];
let MY_REVIEWS = [];
let MY_APPTS = [];
let MY_NOTIFS = [];
const API_BASE = "/api";
const getToken = () => localStorage.getItem("sf_token");
const authHeaders = () => ({
    "Content-Type": "application/json",
    Authorization: `Bearer ${getToken()}`,
    Accept: "application/json",
});
const typeBadge = (tp) =>
    ({
        British: "cb-british",
        American: "cb-american",
        German: "cb-german",
        French: "cb-french",
    })[tp] || "cb-british";

/* ═══════════════════════════════════════
           TRANSLATIONS
           ═══════════════════════════════════════ */
const TR = {
    en: {
        "sl-overview": "Overview",
        "sl-favorites": "Favorites",
        "sl-reviews": "My Reviews",
        "sl-appointments": "Appointments",
        "sl-notifications": "Notifications",
        "sl-profile": "Edit Profile",
        "nav-browse": "← Browse Schools",
        "nav-logout": "Logout",
        "us-favs-lbl": "Favorites",
        "us-revs-lbl": "Reviews",
        "us-appts-lbl": "Appts",
        "ov-tag": "Overview",
        "ov-fav-l": "Saved Schools",
        "ov-rev-l": "Reviews Written",
        "ov-appt-l": "Appointments",
        "ov-recent-title": "Recently Saved",
        "ov-view-all": "View All →",
        "ov-appts-title": "Upcoming Appointments",
        "ov-view-appts": "View All →",
        "fav-title": "My Favorite Schools",
        "fav-add-txt": "Add More Schools",
        "favs-empty-title": "No favorites yet",
        "favs-empty-sub": "Browse schools and save the ones you like",
        "favs-empty-link": "Browse Schools →",
        "rev-page-title": "My Reviews",
        "write-rev-txt": "Write a Review",
        "revs-empty-title": "No reviews yet",
        "revs-empty-sub": "Share your experience to help other parents",
        "appt-page-title": "My Appointments",
        "book-appt-txt": "Book New Appointment",
        "appts-empty-title": "No appointments yet",
        "appts-empty-sub": "Book a visit to a school from its profile page",
        "appts-empty-link": "Browse Schools →",
        "notif-page-title": "Notifications",
        "mark-all-btn": "Mark all as read",
        "notifs-empty-title": "No notifications",
        "notifs-empty-sub": "You're all caught up!",
        "prof-title": "Personal Information",
        "save-prof-txt": "Save Changes",
        "lbl-name": "Full Name",
        "lbl-phone": "Phone Number",
        "lbl-email": "Email Address",
        "lbl-lang": "Preferred Language",
        "pass-title": "Change Password",
        "save-pass-txt": "Update Password",
        "lbl-curr-pass": "Current Password",
        "lbl-new-pass": "New Password",
        "lbl-conf-pass": "Confirm New Password",
        "danger-title": "Danger Zone",
        "del-acc-title": "Delete Account",
        "del-acc-sub": "Permanently delete your account and all your data",
        "del-acc-btn": "Delete Account",
        "wr-modal-title": "Write a Review",
        "wr-school-lbl": "School",
        "wr-rating-lbl": "Rating",
        "wr-text-lbl": "Your Review",
        "wr-submit-btn": "Submit Review",
        removeFav: "Removed from favorites",
        cancelAppt: "Appointment cancelled.",
        ok_profile: "Profile updated!",
        ok_password: "Password updated!",
        err_pass_match: "Passwords do not match.",
        err_curr_pass: "Please enter your current password.",
        err_new_pass: "New password must be at least 8 characters.",
        ok_review: "Review submitted! Pending approval.",
        del_acc_confirm: "Are you sure? This cannot be undone.",
        err_star: "Please select a star rating.",
        err_review: "Please write your review.",
        feeLabel: "/ year",
        "bk-title": "Book a School Visit",
        "bk-school-lbl": "School",
        "bk-school-opt": "Select a school...",
        "bk-date-lbl": "Preferred Visit Date",
        "bk-msg-lbl": "Message (optional)",
        "bk-submit-txt": "Send Request",
    },
    ar: {
        "sl-overview": "نظرة عامة",
        "sl-favorites": "المفضلة",
        "sl-reviews": "تقييماتي",
        "sl-appointments": "المواعيد",
        "sl-notifications": "الإشعارات",
        "sl-profile": "تعديل الملف",
        "nav-browse": "← تصفح المدارس",
        "nav-logout": "تسجيل الخروج",
        "us-favs-lbl": "مفضلة",
        "us-revs-lbl": "تقييمات",
        "us-appts-lbl": "مواعيد",
        "ov-tag": "نظرة عامة",
        "ov-fav-l": "مدارس محفوظة",
        "ov-rev-l": "تقييمات مكتوبة",
        "ov-appt-l": "مواعيد",
        "ov-recent-title": "المحفوظة مؤخراً",
        "ov-view-all": "عرض الكل →",
        "ov-appts-title": "المواعيد القادمة",
        "ov-view-appts": "عرض الكل →",
        "fav-title": "مدارسي المفضلة",
        "fav-add-txt": "إضافة مدارس",
        "favs-empty-title": "لا توجد مفضلة بعد",
        "favs-empty-sub": "تصفح المدارس واحفظ ما يعجبك",
        "favs-empty-link": "تصفح المدارس →",
        "rev-page-title": "تقييماتي",
        "write-rev-txt": "كتابة تقييم",
        "revs-empty-title": "لا توجد تقييمات بعد",
        "revs-empty-sub": "شارك تجربتك لمساعدة أولياء الأمور الآخرين",
        "appt-page-title": "مواعيدي",
        "book-appt-txt": "حجز موعد جديد",
        "appts-empty-title": "لا توجد مواعيد بعد",
        "appts-empty-sub": "احجز زيارة من صفحة ملف المدرسة",
        "appts-empty-link": "تصفح المدارس →",
        "notif-page-title": "الإشعارات",
        "mark-all-btn": "تعليم الكل كمقروء",
        "notifs-empty-title": "لا توجد إشعارات",
        "notifs-empty-sub": "أنت على اطلاع كامل!",
        "prof-title": "المعلومات الشخصية",
        "save-prof-txt": "حفظ التغييرات",
        "lbl-name": "الاسم الكامل",
        "lbl-phone": "رقم الهاتف",
        "lbl-email": "البريد الإلكتروني",
        "lbl-lang": "اللغة المفضلة",
        "pass-title": "تغيير كلمة المرور",
        "save-pass-txt": "تحديث كلمة المرور",
        "lbl-curr-pass": "كلمة المرور الحالية",
        "lbl-new-pass": "كلمة المرور الجديدة",
        "lbl-conf-pass": "تأكيد كلمة المرور الجديدة",
        "danger-title": "منطقة الخطر",
        "del-acc-title": "حذف الحساب",
        "del-acc-sub": "حذف حسابك وجميع بياناتك بشكل دائم",
        "del-acc-btn": "حذف الحساب",
        "wr-modal-title": "كتابة تقييم",
        "wr-school-lbl": "المدرسة",
        "wr-rating-lbl": "التقييم",
        "wr-text-lbl": "تقييمك",
        "wr-submit-btn": "إرسال التقييم",
        removeFav: "تم الإزالة من المفضلة",
        cancelAppt: "تم إلغاء الموعد.",
        ok_profile: "تم تحديث الملف الشخصي!",
        ok_password: "تم تحديث كلمة المرور!",
        err_pass_match: "كلمتا المرور غير متطابقتين.",
        err_curr_pass: "يرجى إدخال كلمة المرور الحالية.",
        err_new_pass: "يجب أن تكون كلمة المرور الجديدة 8 أحرف على الأقل.",
        ok_review: "تم إرسال التقييم! في انتظار الموافقة.",
        del_acc_confirm: "هل أنت متأكد؟ لا يمكن التراجع عن هذا.",
        err_star: "يرجى اختيار عدد النجوم.",
        err_review: "يرجى كتابة تقييمك.",
        feeLabel: "/ سنة",
        "bk-title": "حجز زيارة مدرسية",
        "bk-school-lbl": "المدرسة",
        "bk-school-opt": "اختر مدرسة...",
        "bk-date-lbl": "تاريخ الزيارة المفضل",
        "bk-msg-lbl": "رسالة (اختياري)",
        "bk-submit-txt": "إرسال الطلب",
    },
};

/* ═══════════════════════════════════════
           STATE
           ═══════════════════════════════════════ */
let lang = window.APP_LOCALE || "en",
    activeTab = "overview",
    revStar = 0;
const t = (k) => TR[lang][k] || TR.en[k] || k;

/* ═══════════════════════════════════════
           LANGUAGE
           ═══════════════════════════════════════ */
function toggleLang() {
    lang = lang === "en" ? "ar" : "en";
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
    document.getElementById("lang-lbl").textContent =
        lang === "en" ? "EN" : "AR";
    applyTR();
    renderCurrentTab();
}
function applyTR() {
    Object.keys(TR.en).forEach((k) => {
        if (
            k.startsWith("err_") ||
            k.startsWith("ok_") ||
            k === "removeFav" ||
            k === "cancelAppt" ||
            k === "feeLabel" ||
            k === "del_acc_confirm"
        )
            return;
        const el = document.getElementById(k);
        if (el) el.textContent = t(k);
    });
    // placeholders (cannot be set via textContent)
    const bkMsg = document.getElementById("bk-msg");
    if (bkMsg)
        bkMsg.placeholder =
            lang === "ar"
                ? "أي أسئلة أو طلبات خاصة..."
                : "Any questions or special requests...";
    const wrTxt = document.getElementById("wr-text");
    if (wrTxt)
        wrTxt.placeholder =
            lang === "ar"
                ? "شارك تجربتك حول هذه المدرسة..."
                : "Share your experience about this school...";
    // select default option text
    const bkOpt = document.getElementById("bk-school-opt");
    if (bkOpt) bkOpt.textContent = t("bk-school-opt");
    updateOverviewTitle();
}

/* ═══════════════════════════════════════
           TAB SWITCHING
           ═══════════════════════════════════════ */
const TABS = [
    "overview",
    "favorites",
    "reviews",
    "appointments",
    "notifications",
    "profile",
];
function showTab(tab, el = null) {
    TABS.forEach((tb) => {
        const e = document.getElementById("tab-" + tb);
        if (e) e.style.display = tb === tab ? "block" : "none";
    });
    document
        .querySelectorAll(".sb-item")
        .forEach((i) => i.classList.remove("act"));
    const si = el || document.getElementById("si-" + tab);
    if (si) si.classList.add("act");
    activeTab = tab;
    renderCurrentTab();
    window.scrollTo({ top: 0, behavior: "smooth" });
}
function renderCurrentTab() {
    if (activeTab === "overview") {
        renderRecentFavs();
        renderUpcomingAppts();
        updateOverviewTitle();
    }
    if (activeTab === "favorites") renderFavs();
    if (activeTab === "reviews") renderReviews();
    if (activeTab === "appointments") renderAppts();
    if (activeTab === "notifications") renderNotifs();
}

/* ═══════════════════════════════════════
           OVERVIEW
           ═══════════════════════════════════════ */
function updateOverviewTitle() {
    const name = document.getElementById("prof-name")?.value || "there";
    const firstName = name.split(" ")[0];
    document.getElementById("ov-title").textContent =
        lang === "ar"
            ? `مرحباً بعودتك، ${firstName} 👋`
            : `Welcome back, ${firstName} 👋`;
    document.getElementById("ov-fav-n").textContent = MY_FAVS.length;
    document.getElementById("ov-rev-n").textContent = MY_REVIEWS.length;
    document.getElementById("ov-appt-n").textContent = MY_APPTS.length;
    document.getElementById("us-favs").textContent = MY_FAVS.length;
    document.getElementById("us-revs").textContent = MY_REVIEWS.length;
    document.getElementById("us-appts").textContent = MY_APPTS.length;
    document.getElementById("fav-badge").textContent = MY_FAVS.length;
    const pendingCount = MY_APPTS.filter((a) => a.status === "pending").length;
    document.getElementById("appt-badge").textContent = pendingCount;
    document.getElementById("appt-badge").style.display = pendingCount
        ? "inline-block"
        : "none";
    const unread = MY_NOTIFS.filter((n) => !n.read).length;
    document.getElementById("notif-badge").textContent = unread;
    document.getElementById("notif-badge").style.display = unread
        ? "inline-block"
        : "none";
    document.getElementById("notif-nav-dot").style.display = unread
        ? "block"
        : "none";
}

function renderRecentFavs() {
    const schools = MY_FAVS.slice(0, 3);
    const grid = document.getElementById("recent-favs-grid");
    grid.innerHTML = schools.length
        ? schools.map((s) => schoolCard(s)).join("")
        : `<div class="empty" style="padding:2rem"><div class="empty-icon">❤️</div><h4>${lang === "ar" ? "لا توجد مفضلة بعد" : "No favorites yet"}</h4></div>`;
}

function renderUpcomingAppts() {
    const upcoming = MY_APPTS.filter((a) => a.status === "pending").slice(0, 3);
    document.getElementById("upcoming-appts").innerHTML = upcoming.length
        ? upcoming.map((a) => apptItem(a)).join("")
        : `<div class="empty"><div class="empty-icon">✅</div><h4>${lang === "ar" ? "لا مواعيد قادمة" : "No upcoming appointments"}</h4></div>`;
}

/* ═══════════════════════════════════════
           FAVORITES
           ═══════════════════════════════════════ */
function renderFavs() {
    const grid = document.getElementById("favs-grid");
    const empty = document.getElementById("favs-empty");
    if (!MY_FAVS.length) {
        grid.innerHTML = "";
        empty.style.display = "block";
        return;
    }
    empty.style.display = "none";
    grid.innerHTML = MY_FAVS.map((s) => schoolCard(s)).join("");
}

function schoolCard(s) {
    const badge = s.badge || typeBadge(s.type);
    const fee = s.feeDisp || s.feeDisplay || "";
    const curricula = Array.isArray(s.curricula) ? s.curricula : [];
    return `
  <div class="school-card">
    <div class="sc-top">
      <span class="cbadge ${badge}">${s.type || ""}</span>
      <div class="rem-btn" onclick="removeFav(${s.id})" title="${t("removeFav")}">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </div>
    </div>
    <div class="sc-body">
      <div class="sc-name">${s.name}</div>
      <div class="sc-loc">
        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        ${s.area || ""}
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:.3rem;margin-bottom:.6rem">
        ${curricula.map((c) => `<span class="tag">${c}</span>`).join("")}
      </div>
      <div style="display:flex;justify-content:space-between;align-items:center;padding-top:.6rem;border-top:1px solid #F0F6FF">
        <div><div class="sc-fee">${fee}</div><div class="sc-fee-sub">${t("feeLabel")}</div></div>
        <div class="sc-rating">★ ${s.rating || "—"}</div>
      </div>
    </div>
  </div>`;
}

async function removeFav(id) {
    try {
        await fetch(`${API_BASE}/favorites/${id}`, {
            method: "DELETE",
            headers: authHeaders(),
        });
    } catch (e) {}
    MY_FAVS = MY_FAVS.filter((s) => s.id !== id);
    updateOverviewTitle();
    renderFavs();
    renderRecentFavs();
    toast(t("removeFav"), "inf");
}

async function loadMyFavs() {
    if (!getToken()) return;
    try {
        const res = await fetch(`${API_BASE}/favorites`, {
            headers: authHeaders(),
        });
        const json = await res.json();
        if (json.success) {
            MY_FAVS = json.data || [];
            updateOverviewTitle();
            if (activeTab === "favorites") renderFavs();
            renderRecentFavs();
        }
    } catch (e) {
        console.error("Failed to load favorites", e);
    }
}

/* ═══════════════════════════════════════
           REVIEWS
           ═══════════════════════════════════════ */
function renderReviews() {
    const list = document.getElementById("reviews-list");
    const empty = document.getElementById("revs-empty");
    if (!MY_REVIEWS.length) {
        list.innerHTML = "";
        empty.style.display = "block";
        return;
    }
    empty.style.display = "none";
    list.innerHTML = MY_REVIEWS.map(
        (r) => `
    <div class="review-item">
      <div class="rv-top">
        <div>
          <span class="rv-school">${r.school_name || r.school || ""}</span>
          <span class="rv-status ${r.is_approved ? "st-approved" : "st-pending"}">${r.is_approved ? (lang === "ar" ? "مقبول" : "Approved") : lang === "ar" ? "قيد الانتظار" : "Pending"}</span>
          ${r.is_verified ? `<span style="background:#E8F5F2;color:var(--teal);font-size:.68rem;font-weight:700;padding:.15rem .55rem;border-radius:20px;margin-left:.3rem;font-family:'Sora',sans-serif">${lang === "ar" ? "✓ موثّق" : "✓ Verified"}</span>` : ""}
        </div>
        <div class="rv-date">${r.date || ""}</div>
      </div>
      <div class="rv-stars">${"★".repeat(r.rating)}${"☆".repeat(5 - r.rating)}</div>
      <div class="rv-text">${r.comment || r.text || ""}</div>
    </div>`,
    ).join("");
}

async function loadMyReviews() {
    if (!getToken()) return;
    try {
        const res = await fetch(`${API_BASE}/user/reviews`, {
            headers: authHeaders(),
        });
        const json = await res.json();
        if (json.success) {
            MY_REVIEWS = json.data || [];
            updateOverviewTitle();
            if (activeTab === "reviews") renderReviews();
        }
    } catch (e) {
        console.error("Failed to load reviews", e);
    }
}

function openWriteReview() {
    revStar = 0;
    document.getElementById("wr-text").value = "";
    for (let i = 1; i <= 5; i++)
        document.getElementById("wrs" + i).className = "star";
    document.getElementById("reviewModal").classList.add("open");
}
function setRevStar(n) {
    revStar = n;
    for (let i = 1; i <= 5; i++)
        document.getElementById("wrs" + i).className =
            "star" + (i <= n ? " on" : "");
}

async function submitMyReview() {
    if (!revStar) {
        toast(t("err_star"), "err");
        return;
    }
    const comment = document.getElementById("wr-text").value.trim();
    if (!comment) {
        toast(t("err_review"), "err");
        return;
    }
    const schoolId = document.getElementById("wr-school").value;
    if (!schoolId) {
        toast(
            lang === "ar" ? "يرجى اختيار مدرسة" : "Please select a school",
            "err",
        );
        return;
    }
    const btn = document.getElementById("wr-submit-btn");
    btn.disabled = true;
    try {
        const res = await fetch(`${API_BASE}/schools/${schoolId}/reviews`, {
            method: "POST",
            headers: authHeaders(),
            body: JSON.stringify({ rating: revStar, comment }),
        });
        const json = await res.json();
        if (json.success) {
            document.getElementById("reviewModal").classList.remove("open");
            toast(t("ok_review"), "ok");
            await loadMyReviews();
        } else {
            toast(json.message || "Error submitting review", "err");
        }
    } catch (e) {
        toast("Network error", "err");
    } finally {
        btn.disabled = false;
    }
}

async function populateSchoolSelect() {
    try {
        const res = await fetch(`${API_BASE}/schools?per_page=50`);
        const json = await res.json();
        if (json.success) {
            const sel = document.getElementById("wr-school");
            sel.innerHTML = json.data
                .map((s) => `<option value="${s.id}">${s.name}</option>`)
                .join("");
        }
    } catch (e) {
        console.error("Failed to load schools for select", e);
    }
}

/* ═══════════════════════════════════════
           APPOINTMENTS
           ═══════════════════════════════════════ */
function renderAppts() {
    const list = document.getElementById("appts-list");
    const empty = document.getElementById("appts-empty");
    if (!MY_APPTS.length) {
        list.innerHTML = "";
        empty.style.display = "block";
        return;
    }
    empty.style.display = "none";
    list.innerHTML = MY_APPTS.map((a) => apptItem(a)).join("");
}
function apptItem(a) {
    const extra =
        a.status === "confirmed" && a.confirmed_date
            ? `<div style="font-size:.78rem;color:#065F46;margin-top:.2rem">${lang === "ar" ? "✓ مؤكد في" : "✓ Confirmed for"} ${a.confirmed_date}</div>`
            : a.status === "cancelled" && a.cancel_reason
              ? `<div style="font-size:.78rem;color:#991B1B;margin-top:.2rem">${a.cancel_reason}</div>`
              : a.status === "attention" && a.attention_note
                ? `<div style="font-size:.78rem;color:#1D4ED8;margin-top:.2rem">⚠️ ${a.attention_note}</div>`
                : "";
    return `<div class="appt-item">
    <div class="appt-info">
      <div class="appt-school">${a.school || a.school_name || ""}</div>
      <div class="appt-date">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        ${a.date || ""}
      </div>
      <div class="appt-msg">${a.msg || a.message || ""}</div>
      ${extra}
    </div>
    <div style="display:flex;align-items:center;gap:.6rem">
      <span class="appt-badge ab-${a.status}">${{ pending: lang === "ar" ? "قيد الانتظار" : "Pending", confirmed: lang === "ar" ? "مؤكد" : "Confirmed", cancelled: lang === "ar" ? "ملغي" : "Cancelled", attention: lang === "ar" ? "يحتاج انتباهاً" : "Attention" }[a.status] || a.status}</span>
      ${a.status === "pending" ? `<button class="btn-sm btn-red" onclick="cancelAppt(${a.id})" style="font-size:.75rem">${lang === "ar" ? "إلغاء" : "Cancel"}</button>` : ""}
    </div>
  </div>`;
}
async function cancelAppt(id) {
    try {
        const res = await fetch(`${API_BASE}/appointments/${id}/cancel`, {
            method: "PUT",
            headers: authHeaders(),
        });
        const json = await res.json();
        if (!json.success) {
            toast(json.message || "Failed to cancel", "err");
            return;
        }
    } catch (e) {
        toast("Network error", "err");
        return;
    }
    const a = MY_APPTS.find((x) => x.id === id);
    if (a) {
        a.status = "cancelled";
        renderAppts();
        renderUpcomingAppts();
        updateOverviewTitle();
        toast(t("cancelAppt"), "inf");
    }
}

async function loadMyAppts() {
    if (!getToken()) return;
    try {
        const res = await fetch(`${API_BASE}/appointments`, {
            headers: authHeaders(),
        });
        const json = await res.json();
        if (json.success) {
            MY_APPTS = json.data || [];
            updateOverviewTitle();
            if (activeTab === "appointments") renderAppts();
            renderUpcomingAppts();
        }
    } catch (e) {
        console.error("Failed to load appointments", e);
    }
}

/* ═══════════════════════════════════════
           NOTIFICATIONS
           ═══════════════════════════════════════ */
function renderNotifs() {
    const list = document.getElementById("notifs-list");
    const empty = document.getElementById("notifs-empty");
    if (!MY_NOTIFS.length) {
        list.innerHTML = "";
        empty.style.display = "block";
        return;
    }
    empty.style.display = "none";
    list.innerHTML = MY_NOTIFS.map(
        (n) => `
    <div class="notif-item ${n.read ? "" : "unread"}" onclick="markRead(${n.id})">
      <div class="notif-dot2 ${n.read ? "read" : ""}"></div>
      <div style="flex:1">
        <div class="notif-title">${n.title || ""}</div>
        <div class="notif-msg">${n.msg || n.message || ""}</div>
        <div class="notif-time">${n.time || n.created_at || ""}</div>
      </div>
    </div>`,
    ).join("");
}
async function markRead(id) {
    const n = MY_NOTIFS.find((x) => x.id === id);
    if (!n || n.read) return;
    try {
        await fetch(`${API_BASE}/notifications/${id}/read`, {
            method: "PUT",
            headers: authHeaders(),
        });
    } catch (e) {}
    n.read = true;
    renderNotifs();
    updateOverviewTitle();
}
async function markAllRead() {
    try {
        await fetch(`${API_BASE}/notifications/read-all`, {
            method: "PUT",
            headers: authHeaders(),
        });
    } catch (e) {}
    MY_NOTIFS.forEach((n) => (n.read = true));
    renderNotifs();
    updateOverviewTitle();
    toast(lang === "ar" ? "تم تعليم الكل كمقروء" : "All marked as read", "ok");
}

async function loadMyNotifs() {
    if (!getToken()) return;
    try {
        const res = await fetch(`${API_BASE}/notifications`, {
            headers: authHeaders(),
        });
        const json = await res.json();
        if (json.success) {
            MY_NOTIFS = json.data || [];
            updateOverviewTitle();
            if (activeTab === "notifications") renderNotifs();
        }
    } catch (e) {
        console.error("Failed to load notifications", e);
    }
}

async function refreshUnreadBadge() {
    if (!getToken()) return;
    try {
        const res = await fetch(`${API_BASE}/notifications/unread-count`, {
            headers: authHeaders(),
        });
        const json = await res.json();
        if (json.success) {
            const count = json.data.count;
            document.getElementById("notif-badge").textContent = count;
            document.getElementById("notif-badge").style.display = count
                ? "inline-block"
                : "none";
            document.getElementById("notif-nav-dot").style.display = count
                ? "block"
                : "none";
        }
    } catch (e) {}
}

/* ═══════════════════════════════════════
           PROFILE
           ═══════════════════════════════════════ */
async function saveProfile() {
    const name = document.getElementById("prof-name").value.trim();
    if (!name) {
        toast(
            lang === "ar" ? "يرجى إدخال اسمك" : "Please enter your name",
            "err",
        );
        return;
    }
    const phone = document.getElementById("prof-phone")?.value.trim() || null;
    const language = document.getElementById("prof-lang")?.value || null;
    const btn = document.getElementById("save-prof-btn");
    btn.disabled = true;
    try {
        const res = await fetch(`${API_BASE}/auth/profile`, {
            method: "PUT",
            headers: authHeaders(),
            body: JSON.stringify({ name, phone, language }),
        });
        const json = await res.json();
        if (json.success) {
            const initials = name
                .split(" ")
                .map((w) => w[0])
                .slice(0, 2)
                .join("")
                .toUpperCase();
            document.getElementById("user-avatar").textContent = initials;
            document.getElementById("user-name").textContent = name;
            const stored = JSON.parse(localStorage.getItem("sf_user") || "{}");
            localStorage.setItem(
                "sf_user",
                JSON.stringify({ ...stored, name }),
            );
            updateOverviewTitle();
            toast(t("ok_profile"), "ok");
        } else toast(json.message || "Error", "err");
    } catch (e) {
        toast("Network error", "err");
    } finally {
        btn.disabled = false;
    }
}

async function savePassword() {
    const curr = document.getElementById("curr-pass").value;
    const nw = document.getElementById("new-pass").value;
    const conf = document.getElementById("conf-pass").value;
    if (!curr) {
        toast(t("err_curr_pass"), "err");
        return;
    }
    if (nw.length < 8) {
        toast(t("err_new_pass"), "err");
        return;
    }
    if (nw !== conf) {
        toast(t("err_pass_match"), "err");
        return;
    }
    const btn = document.getElementById("save-pass-btn");
    btn.disabled = true;
    try {
        const res = await fetch(`${API_BASE}/auth/password`, {
            method: "PUT",
            headers: authHeaders(),
            body: JSON.stringify({
                current_password: curr,
                new_password: nw,
                new_password_confirmation: conf,
            }),
        });
        const json = await res.json();
        if (json.success) {
            ["curr-pass", "new-pass", "conf-pass"].forEach(
                (id) => (document.getElementById(id).value = ""),
            );
            toast(t("ok_password"), "ok");
        } else toast(json.message || "Error", "err");
    } catch (e) {
        toast("Network error", "err");
    } finally {
        btn.disabled = false;
    }
}

function toggleEye(id, btn) {
    const inp = document.getElementById(id);
    inp.type = inp.type === "password" ? "text" : "password";
    btn.innerHTML =
        inp.type === "text"
            ? `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
            : `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
}

async function confirmDeleteAccount() {
    const r = await sfConfirm(
        "This will permanently delete your account and all your data. This cannot be undone.",
        "Delete Account",
        "⚠️",
        true,
    );
    if (r.action === "confirm") doLogout();
}

/* ═══════════════════════════════════════
           LOGOUT
           ═══════════════════════════════════════ */
function doLogout() {
    localStorage.removeItem("sf_token");
    localStorage.removeItem("sf_user");
    window.location.href = "/login";
}

/* ═══════════════════════════════════════
           TOAST
           ═══════════════════════════════════════ */
let ttimer;
function toast(msg, type = "inf") {
    const el = document.getElementById("toast");
    el.textContent = msg;
    el.className = `toast show ${type}`;
    clearTimeout(ttimer);
    ttimer = setTimeout(() => (el.className = "toast"), 2600);
}

/* ═══════════════════════════════════════
           INIT
           ═══════════════════════════════════════ */
// Populate from localStorage immediately (fast render)
const sfUser = JSON.parse(localStorage.getItem("sf_user") || "null");
if (sfUser) {
    if (sfUser.name) {
        document.getElementById("user-name").textContent = sfUser.name;
        document.getElementById("prof-name").value = sfUser.name;
        const initials = sfUser.name
            .split(" ")
            .map((w) => w[0])
            .slice(0, 2)
            .join("")
            .toUpperCase();
        document.getElementById("user-avatar").textContent = initials;
    }
    if (sfUser.email) {
        document.getElementById("user-email").textContent = sfUser.email;
        document.getElementById("prof-email").value = sfUser.email;
    }
}

applyTR();
renderCurrentTab();
updateOverviewTitle();
loadMyFavs();
loadMyReviews();
loadMyAppts();
loadMyNotifs();
populateSchoolSelect();

/* ═══════════════════════════════════════
           BOOKING MODAL
           ═══════════════════════════════════════ */
async function openBookingModal() {
    const sel = document.getElementById("bk-school");
    // Load schools into dropdown only once
    if (sel.options.length <= 1) {
        try {
            const res = await fetch(`${API_BASE}/schools?per_page=100`);
            const json = await res.json();
            if (json.success)
                (json.data || []).forEach((s) => {
                    const opt = document.createElement("option");
                    opt.value = s.id;
                    opt.textContent = s.name;
                    sel.appendChild(opt);
                });
        } catch (e) {}
    }
    // Set minimum date to tomorrow
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    document.getElementById("bk-date").min = tomorrow
        .toISOString()
        .split("T")[0];
    document.getElementById("bk-date").value = "";
    document.getElementById("bk-msg").value = "";
    document.getElementById("bookingMod").classList.add("open");
}

function closeBookingMod(e) {
    if (!e || e.target === document.getElementById("bookingMod")) {
        document.getElementById("bookingMod").classList.remove("open");
    }
}

async function submitBooking() {
    const schoolId = document.getElementById("bk-school").value;
    const date = document.getElementById("bk-date").value;
    const msg = document.getElementById("bk-msg").value.trim();
    if (!schoolId) {
        toast(
            lang === "ar" ? "يرجى اختيار مدرسة" : "Please select a school",
            "err",
        );
        return;
    }
    if (!date) {
        toast(
            lang === "ar" ? "يرجى اختيار تاريخ" : "Please select a date",
            "err",
        );
        return;
    }
    const btn = document.querySelector("#bookingMod .sub-btn");
    btn.disabled = true;
    btn.textContent = "...";
    try {
        const res = await fetch(`${API_BASE}/appointments`, {
            method: "POST",
            headers: authHeaders(),
            body: JSON.stringify({
                school_id: parseInt(schoolId),
                preferred_date: date,
                message: msg || null,
            }),
        });
        const json = await res.json();
        if (res.ok && json.success) {
            toast(
                lang === "ar" ? "تم حجز الموعد!" : "Appointment booked!",
                "ok",
            );
            document.getElementById("bookingMod").classList.remove("open");
            loadMyAppts();
        } else {
            toast(json.message || "Failed to book appointment", "err");
        }
    } catch (e) {
        toast("Network error", "err");
    } finally {
        btn.disabled = false;
        btn.textContent = lang === "ar" ? "إرسال الطلب" : "Send Request";
    }
}

// Refresh profile from API and update UI
if (getToken()) {
    fetch(`${API_BASE}/auth/me`, { headers: authHeaders() })
        .then((r) => r.json())
        .then((json) => {
            if (!json.success) return;
            const u = json.data || json.user || {};
            if (u.name) {
                document.getElementById("user-name").textContent = u.name;
                document.getElementById("prof-name").value = u.name;
                const initials = u.name
                    .split(" ")
                    .map((w) => w[0])
                    .slice(0, 2)
                    .join("")
                    .toUpperCase();
                document.getElementById("user-avatar").textContent = initials;
                updateOverviewTitle();
            }
            if (u.email) {
                document.getElementById("user-email").textContent = u.email;
                document.getElementById("prof-email").value = u.email;
            }
            if (u.phone && document.getElementById("prof-phone")) {
                document.getElementById("prof-phone").value = u.phone;
            }
        })
        .catch(() => {});
}
