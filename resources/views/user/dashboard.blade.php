<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
window.APP_LOCALE = "{{ app()->getLocale() }}";
window.IS_RTL = {{ app()->getLocale() === 'ar' ? 'true' : 'false' }};
if (window.APP_LOCALE) localStorage.setItem('sf_locale', window.APP_LOCALE);
</script>
<title>My Dashboard — SchoolFinder Egypt</title>

<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--navy:#0F2942;--blue:#1A5276;--teal:#148F77;--td:#117a65;--light:#F0F6FF;--text:#1C2B3A;--muted:#5D7285;--border:#D6E4F0;--bg:#F0F4F8;--err:#e74c3c;--ok:#148F77;--warn:#E67E22;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
h1,h2,h3,h4{font-family:'Sora',sans-serif;}

/* NAV */
nav{background:var(--navy);position:sticky;top:0;z-index:100;box-shadow:0 2px 20px rgba(15,41,66,.4);}
.nav-i{max-width:1280px;margin:auto;padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:66px;}
.logo{display:flex;align-items:center;gap:.6rem;text-decoration:none;}
.logo-icon{width:36px;height:36px;background:linear-gradient(135deg,var(--teal),#1abc9c);border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:'Sora',sans-serif;font-weight:800;color:white;font-size:1rem;}
.logo-txt{font-family:'Sora',sans-serif;font-weight:700;font-size:1.1rem;color:white;}
.logo-txt span{color:#52d9bd;}
.nav-right{display:flex;align-items:center;gap:.75rem;}
.lang-btn{display:flex;align-items:center;gap:.35rem;padding:.34rem .85rem;background:rgba(255,255,255,.1);border-radius:20px;cursor:pointer;color:#a8c4d8;font-size:.8rem;font-weight:600;border:none;transition:all .2s;}
.lang-btn:hover{background:rgba(255,255,255,.18);color:white;}
.btn-ghost{padding:.4rem 1rem;border:1.5px solid rgba(255,255,255,.25);border-radius:8px;color:white;font-size:.86rem;font-weight:500;cursor:pointer;background:transparent;transition:all .2s;text-decoration:none;display:inline-block;}
.btn-ghost:hover{border-color:rgba(255,255,255,.6);}
.notif-btn{position:relative;width:36px;height:36px;border-radius:9px;border:1.5px solid rgba(255,255,255,.2);background:transparent;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#a8c4d8;transition:all .2s;}
.notif-btn:hover{border-color:rgba(255,255,255,.5);color:white;}
.notif-dot{position:absolute;top:6px;right:6px;width:7px;height:7px;background:var(--err);border-radius:50%;border:2px solid var(--navy);}

/* LAYOUT */
.layout{max-width:1280px;margin:auto;padding:2rem;display:grid;grid-template-columns:240px 1fr;gap:1.5rem;}

/* SIDEBAR */
.sidebar{position:sticky;top:82px;height:fit-content;}
.user-card{background:white;border-radius:14px;border:1.5px solid var(--border);padding:1.4rem;text-align:center;margin-bottom:1rem;}
.avatar{width:64px;height:64px;background:linear-gradient(135deg,var(--teal),#1abc9c);border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Sora',sans-serif;font-weight:800;font-size:1.4rem;color:white;margin:0 auto .8rem;}
.user-name{font-family:'Sora',sans-serif;font-weight:700;font-size:1rem;color:var(--navy);}
.user-email{font-size:.8rem;color:var(--muted);margin-top:.15rem;}
.user-since{font-size:.74rem;color:var(--muted);margin-top:.5rem;padding-top:.5rem;border-top:1px solid var(--border);}
.user-stats{display:flex;justify-content:center;gap:1.2rem;margin-top:.8rem;}
.ustat{text-align:center;}
.ustat-n{font-family:'Sora',sans-serif;font-weight:700;font-size:1rem;color:var(--navy);}
.ustat-l{font-size:.7rem;color:var(--muted);}

.sb-nav{background:white;border-radius:14px;border:1.5px solid var(--border);overflow:hidden;}
.sb-item{display:flex;align-items:center;gap:.7rem;padding:.65rem 1.1rem;color:var(--muted);font-size:.88rem;font-weight:500;cursor:pointer;transition:all .2s;border-left:3px solid transparent;}
.sb-item:hover{color:var(--navy);background:#F8FAFF;}
.sb-item.act{color:var(--teal);background:#E8F5F2;border-left-color:var(--teal);font-weight:600;}
.sb-item:not(:last-child){border-bottom:1px solid #F5F8FF;}
.sb-badge{margin-left:auto;background:var(--err);color:white;font-size:.65rem;font-weight:700;padding:.1rem .42rem;border-radius:10px;min-width:18px;text-align:center;}
[dir="rtl"] .sb-item{border-left:none;border-right:3px solid transparent;}
[dir="rtl"] .sb-item.act{border-right-color:var(--teal);}
[dir="rtl"] .sb-badge{margin-left:0;margin-right:auto;}

/* MAIN CONTENT */
.main{}

/* SECTION CARD */
.sec-card{background:white;border-radius:14px;border:1.5px solid var(--border);margin-bottom:1.4rem;overflow:hidden;}
.sec-head{padding:1.1rem 1.4rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.6rem;}
.sec-head h3{font-family:'Sora',sans-serif;font-weight:700;font-size:.97rem;color:var(--navy);}
.sec-tag{display:inline-block;background:#E8F5F2;color:var(--teal);font-size:.72rem;font-weight:600;padding:.22rem .7rem;border-radius:20px;}

/* BUTTONS */
.btn-sm{padding:.38rem .9rem;border-radius:8px;font-family:'Sora',sans-serif;font-weight:600;font-size:.8rem;cursor:pointer;transition:all .2s;border:none;display:inline-flex;align-items:center;gap:.35rem;}
.btn-teal{background:var(--teal);color:white;}
.btn-teal:hover{background:var(--td);}
.btn-outline{background:white;color:var(--navy);border:1.5px solid var(--border)!important;}
.btn-outline:hover{border-color:var(--teal)!important;color:var(--teal);}
.btn-red{background:#FEF2F2;color:var(--err);}
.btn-red:hover{background:var(--err);color:white;}

/* OVERVIEW CARDS */
.overview-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;padding:1.2rem 1.4rem;}
.ov-card{background:var(--light);border-radius:12px;padding:1rem 1.1rem;border:1.5px solid var(--border);display:flex;align-items:center;gap:.85rem;}
.ov-icon{width:40px;height:40px;border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ov-val{font-family:'Sora',sans-serif;font-weight:800;font-size:1.3rem;color:var(--navy);line-height:1;}
.ov-lbl{font-size:.78rem;color:var(--muted);margin-top:.15rem;}

/* SCHOOL CARDS (favorites) */
.fav-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.1rem;padding:1.2rem 1.4rem;}
.school-card{background:white;border-radius:12px;border:1.5px solid var(--border);overflow:hidden;transition:all .22s;}
.school-card:hover{border-color:var(--teal);transform:translateY(-3px);box-shadow:0 12px 32px rgba(0,0,0,.09);}
.sc-top{padding:.9rem 1.1rem .75rem;border-bottom:1px solid #F0F6FF;display:flex;justify-content:space-between;align-items:flex-start;}
.cbadge{font-size:.69rem;font-weight:600;padding:.2rem .62rem;border-radius:20px;}
.cb-british{background:#EEF2FF;color:#3730A3;}
.cb-american{background:#FFF7ED;color:#9A3412;}
.cb-german{background:#F0FDF4;color:#166534;}
.cb-french{background:#FFF1F2;color:#9F1239;}
.sc-body{padding:.8rem 1.1rem .9rem;}
.sc-name{font-family:'Sora',sans-serif;font-weight:700;font-size:.92rem;color:var(--navy);margin-bottom:.22rem;line-height:1.3;}
.sc-loc{display:flex;align-items:center;gap:.28rem;color:var(--muted);font-size:.78rem;margin-bottom:.65rem;}
.sc-fee{font-family:'Sora',sans-serif;font-weight:700;font-size:.84rem;color:var(--navy);}
.sc-fee-sub{font-size:.71rem;color:var(--muted);}
.sc-rating{color:#d4770a;font-size:.8rem;font-weight:600;}
.tag{font-size:.7rem;background:var(--light);color:var(--blue);padding:.17rem .55rem;border-radius:6px;font-weight:500;}
.rem-btn{width:27px;height:27px;border-radius:7px;border:1.5px solid var(--border);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--muted);transition:all .2s;flex-shrink:0;}
.rem-btn:hover{border-color:var(--err);color:var(--err);}

/* REVIEWS */
.review-item{padding:1rem 1.4rem;border-bottom:1px solid #F5F8FF;}
.review-item:last-child{border-bottom:none;}
.rv-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:.35rem;}
.rv-school{font-family:'Sora',sans-serif;font-weight:700;font-size:.9rem;color:var(--navy);}
.rv-date{font-size:.74rem;color:var(--muted);}
.rv-stars{color:#f39c12;font-size:.85rem;margin-bottom:.3rem;}
.rv-text{font-size:.85rem;color:var(--muted);line-height:1.6;}
.rv-status{font-size:.7rem;font-weight:600;padding:.18rem .58rem;border-radius:20px;margin-left:.5rem;}
.st-approved{background:#D1FAE5;color:#065F46;}
.st-pending{background:#FEF3C7;color:#92400E;}

/* APPOINTMENTS */
.appt-item{padding:1rem 1.4rem;border-bottom:1px solid #F5F8FF;display:flex;align-items:center;justify-content:space-between;gap:.8rem;flex-wrap:wrap;}
.appt-item:last-child{border-bottom:none;}
.appt-info{}
.appt-school{font-family:'Sora',sans-serif;font-weight:700;font-size:.9rem;color:var(--navy);}
.appt-date{font-size:.79rem;color:var(--muted);margin-top:.15rem;display:flex;align-items:center;gap:.3rem;}
.appt-msg{font-size:.8rem;color:var(--muted);margin-top:.2rem;}
.appt-badge{font-size:.72rem;font-weight:600;padding:.22rem .7rem;border-radius:20px;white-space:nowrap;}
.ab-pending{background:#FEF3C7;color:#92400E;}
.ab-confirmed{background:#D1FAE5;color:#065F46;}
.ab-cancelled{background:#FEE2E2;color:#991B1B;}
.ab-attention{background:#EFF6FF;color:#1D4ED8;}

/* NOTIFICATIONS */
.notif-item{padding:.9rem 1.4rem;border-bottom:1px solid #F5F8FF;display:flex;align-items:flex-start;gap:.85rem;cursor:pointer;transition:background .2s;}
.notif-item:last-child{border-bottom:none;}
.notif-item:hover{background:#FAFCFF;}
.notif-item.unread{background:#F0F9FF;}
.notif-dot2{width:8px;height:8px;background:var(--teal);border-radius:50%;margin-top:.35rem;flex-shrink:0;}
.notif-dot2.read{background:var(--border);}
.notif-title{font-family:'Sora',sans-serif;font-weight:600;font-size:.87rem;color:var(--navy);margin-bottom:.18rem;}
.notif-msg{font-size:.81rem;color:var(--muted);line-height:1.55;}
.notif-time{font-size:.72rem;color:var(--muted);margin-top:.2rem;}

/* PROFILE FORM */
.prof-form{padding:1.4rem 1.5rem;}
.field{margin-bottom:1rem;}
.field label{display:block;font-size:.8rem;font-weight:600;color:var(--navy);margin-bottom:.38rem;}
.fi{width:100%;border:1.5px solid var(--border);border-radius:9px;padding:.62rem .88rem;font-family:'DM Sans',sans-serif;font-size:.88rem;color:var(--text);outline:none;transition:border-color .2s;}
.fi:focus{border-color:var(--teal);box-shadow:0 0 0 3px rgba(20,143,119,.08);}
.fi-2{display:grid;grid-template-columns:1fr 1fr;gap:.9rem;}
.pass-wrap{position:relative;}
.eye-btn{position:absolute;right:.8rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:var(--muted);}

/* EMPTY STATE */
.empty{text-align:center;padding:3rem 2rem;color:var(--muted);}
.empty-icon{font-size:2.2rem;margin-bottom:.7rem;}
.empty h4{font-size:.95rem;color:var(--navy);margin-bottom:.3rem;}
.empty a{color:var(--teal);font-weight:600;text-decoration:none;font-size:.88rem;}

/* MODAL */
.ov{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:200;display:none;align-items:center;justify-content:center;padding:1rem;}
.ov.open{display:flex;}
.modal{background:white;border-radius:16px;width:100%;max-width:480px;max-height:90vh;overflow-y:auto;box-shadow:0 30px 80px rgba(0,0,0,.25);}
.mh{padding:1.1rem 1.4rem;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;background:white;z-index:10;}
.mh h3{font-family:'Sora',sans-serif;font-weight:700;font-size:.98rem;color:var(--navy);}
.mclose{width:29px;height:29px;border-radius:7px;border:1.5px solid var(--border);background:white;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--muted);transition:all .2s;}
.mclose:hover{border-color:var(--err);color:var(--err);}
.mb{padding:1.2rem 1.4rem;}
.star-r{display:flex;gap:.3rem;margin-bottom:.8rem;}
.star{font-size:1.5rem;cursor:pointer;color:#d6e4f0;transition:color .15s;}
.star.on{color:#f39c12;}
.sub-btn{background:var(--teal);color:white;border:none;border-radius:9px;padding:.62rem 1.5rem;font-family:'Sora',sans-serif;font-weight:600;font-size:.88rem;cursor:pointer;transition:all .2s;margin-top:.5rem;}
.sub-btn:hover{background:var(--td);}

/* TOAST */
.toast{position:fixed;bottom:1.5rem;right:1.5rem;background:var(--navy);color:white;padding:.65rem 1.1rem;border-radius:10px;font-size:.83rem;z-index:400;box-shadow:0 8px 24px rgba(0,0,0,.25);transition:opacity .3s,transform .3s;opacity:0;transform:translateY(8px);pointer-events:none;max-width:280px;}
.toast.show{opacity:1;transform:translateY(0);}
.toast.ok{border-left:3px solid #52d9bd;}
.toast.err{border-left:3px solid #e74c3c;}
.toast.inf{border-left:3px solid #3498db;}

@media(max-width:900px){
  .layout{grid-template-columns:1fr;}
  .sidebar{position:static;}
  .overview-grid{grid-template-columns:1fr 1fr;}
}
@media(max-width:500px){
  .overview-grid{grid-template-columns:1fr;}
  .fi-2{grid-template-columns:1fr;}
}
[dir="rtl"] body{direction:rtl;}
[dir="rtl"] .nav-i{flex-direction:row-reverse;}
[dir="rtl"] .nav-right{flex-direction:row-reverse;}
[dir="rtl"] .layout{direction:rtl;}
[dir="rtl"] .sec-head{flex-direction:row-reverse;}
[dir="rtl"] .toast{right:auto;left:1.5rem;}
</style>
</head>
<body style="visibility:hidden">

<!-- AUTH GUARD — synchronous, runs before any paint -->
<script>
(function(){
  var token = localStorage.getItem('sf_token');
  if (!token) { window.location.replace('/login'); return; }
  document.body.style.visibility = 'visible';
})();
</script>

<!-- NAV -->
<nav>
  <div class="nav-i">
    <a href="{{ url('/') }}" class="logo">
      <div class="logo-icon">SF</div>
      <span class="logo-txt">School<span>Finder</span></span>
    </a>
    <div class="nav-right">
      <form method="POST" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" style="display:inline" onsubmit="localStorage.setItem('sf_locale','{{ app()->getLocale() === 'en' ? 'ar' : 'en' }}')">
        @csrf
        <button type="submit" class="lang-btn">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
          {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
        </button>
      </form>
      <button class="notif-btn" onclick="showTab('notifications');refreshUnreadBadge()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <div class="notif-dot" id="notif-nav-dot" style="display:none"></div>
      </button>
      <a href="{{ url('/') }}" class="btn-ghost" id="nav-browse">← Browse Schools</a>
      <a href="{{ route('login') }}" class="btn-ghost" onclick="doLogout();return false;" id="nav-logout">Logout</a>
    </div>
  </div>
</nav>

<!-- LAYOUT -->
<div class="layout">

  <!-- SIDEBAR -->
  <div class="sidebar">

    <!-- User Card -->
    <div class="user-card">
      <div class="avatar" id="user-avatar">U</div>
      <div class="user-name" id="user-name">Loading...</div>
      <div class="user-email" id="user-email"></div>
      <div class="user-since" id="user-since">Member since 2026</div>
      <div class="user-stats">
        <div class="ustat"><div class="ustat-n" id="us-favs">0</div><div class="ustat-l" id="us-favs-lbl">Favorites</div></div>
        <div class="ustat"><div class="ustat-n" id="us-revs">0</div><div class="ustat-l" id="us-revs-lbl">Reviews</div></div>
        <div class="ustat"><div class="ustat-n" id="us-appts">0</div><div class="ustat-l" id="us-appts-lbl">Appts</div></div>
      </div>
    </div>

    <!-- Nav -->
    <div class="sb-nav">
      <div class="sb-item act" onclick="showTab('overview',this)" id="si-overview">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span id="sl-overview">Overview</span>
      </div>
      <div class="sb-item" onclick="showTab('favorites',this)" id="si-favorites">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        <span id="sl-favorites">Favorites</span>
        <span class="sb-badge" id="fav-badge">0</span>
      </div>
      <div class="sb-item" onclick="showTab('reviews',this)" id="si-reviews">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <span id="sl-reviews">My Reviews</span>
      </div>
      <div class="sb-item" onclick="showTab('appointments',this)" id="si-appointments">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <span id="sl-appointments">Appointments</span>
        <span class="sb-badge" id="appt-badge" style="background:var(--warn)">0</span>
      </div>
      <div class="sb-item" onclick="showTab('notifications',this)" id="si-notifications">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span id="sl-notifications">Notifications</span>
        <span class="sb-badge" id="notif-badge" style="display:none">0</span>
      </div>
      <div class="sb-item" onclick="showTab('profile',this)" id="si-profile">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span id="sl-profile">Edit Profile</span>
      </div>
    </div>
  </div>

  <!-- MAIN -->
  <div class="main">

    <!-- ══ OVERVIEW ══ -->
    <div id="tab-overview">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-title">Welcome back 👋</h3>
          <span class="sec-tag" id="ov-tag">Overview</span>
        </div>
        <div class="overview-grid">
          <div class="ov-card" onclick="showTab('favorites',document.getElementById('si-favorites'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#E8F5F2">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--teal)" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <div><div class="ov-val" id="ov-fav-n">0</div><div class="ov-lbl" id="ov-fav-l">Saved Schools</div></div>
          </div>
          <div class="ov-card" onclick="showTab('reviews',document.getElementById('si-reviews'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#FEF3E2">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--warn)" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div><div class="ov-val" id="ov-rev-n">0</div><div class="ov-lbl" id="ov-rev-l">Reviews Written</div></div>
          </div>
          <div class="ov-card" onclick="showTab('appointments',document.getElementById('si-appointments'))" style="cursor:pointer">
            <div class="ov-icon" style="background:#EBF5FB">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3498db" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div><div class="ov-val" id="ov-appt-n">0</div><div class="ov-lbl" id="ov-appt-l">Appointments</div></div>
          </div>
        </div>
      </div>

      <!-- Recent favorites -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-recent-title">Recently Saved</h3>
          <button class="btn-sm btn-outline" onclick="showTab('favorites',document.getElementById('si-favorites'))" id="ov-view-all">View All →</button>
        </div>
        <div class="fav-grid" id="recent-favs-grid"></div>
      </div>

      <!-- Upcoming Appointments -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="ov-appts-title">Upcoming Appointments</h3>
          <button class="btn-sm btn-outline" onclick="showTab('appointments',document.getElementById('si-appointments'))" id="ov-view-appts">View All →</button>
        </div>
        <div id="upcoming-appts"></div>
      </div>
    </div>

    <!-- ══ FAVORITES ══ -->
    <div id="tab-favorites" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="fav-title">My Favorite Schools</h3>
          <button class="btn-sm btn-teal" onclick="window.location.href='{{ url('/') }}'" id="fav-add-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span id="fav-add-txt">Add More Schools</span>
          </button>
        </div>
        <div class="fav-grid" id="favs-grid"></div>
        <div class="empty" id="favs-empty" style="display:none">
          <div class="empty-icon">❤️</div>
          <h4 id="favs-empty-title">No favorites yet</h4>
          <p style="font-size:.83rem;margin-bottom:.8rem" id="favs-empty-sub">Browse schools and save the ones you like</p>
          <a href="{{ url('/') }}" id="favs-empty-link">Browse Schools →</a>
        </div>
      </div>
    </div>

    <!-- ══ REVIEWS ══ -->
    <div id="tab-reviews" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="rev-page-title">My Reviews</h3>
          <button class="btn-sm btn-teal" onclick="openWriteReview()" id="write-rev-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            <span id="write-rev-txt">Write a Review</span>
          </button>
        </div>
        <div id="reviews-list"></div>
        <div class="empty" id="revs-empty" style="display:none">
          <div class="empty-icon">✍️</div>
          <h4 id="revs-empty-title">No reviews yet</h4>
          <p style="font-size:.83rem;margin-bottom:.8rem" id="revs-empty-sub">Share your experience to help other parents</p>
        </div>
      </div>
    </div>

    <!-- ══ APPOINTMENTS ══ -->
    <div id="tab-appointments" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="appt-page-title">My Appointments</h3>
          <button class="btn-sm btn-teal" onclick="openBookingModal()" id="book-appt-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span id="book-appt-txt">Book New Appointment</span>
          </button>
        </div>
        <div id="appts-list"></div>
        <div class="empty" id="appts-empty" style="display:none">
          <div class="empty-icon">📅</div>
          <h4 id="appts-empty-title">No appointments yet</h4>
          <p style="font-size:.83rem;margin-bottom:.8rem" id="appts-empty-sub">Book a visit to a school from its profile page</p>
          <a href="{{ url('/') }}" id="appts-empty-link">Browse Schools →</a>
        </div>
      </div>
    </div>

    <!-- ══ NOTIFICATIONS ══ -->
    <div id="tab-notifications" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="notif-page-title">Notifications</h3>
          <button class="btn-sm btn-outline" onclick="markAllRead()" id="mark-all-btn">Mark all as read</button>
        </div>
        <div id="notifs-list"></div>
        <div class="empty" id="notifs-empty" style="display:none">
          <div class="empty-icon">🔔</div>
          <h4 id="notifs-empty-title">No notifications</h4>
          <p style="font-size:.83rem" id="notifs-empty-sub">You're all caught up!</p>
        </div>
      </div>
    </div>

    <!-- ══ PROFILE ══ -->
    <div id="tab-profile" style="display:none">

      <!-- Personal Info -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="prof-title">Personal Information</h3>
          <button class="btn-sm btn-teal" onclick="saveProfile()" id="save-prof-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17,21 17,13 7,13 7,21"/><polyline points="7,3 7,8 15,8"/></svg>
            <span id="save-prof-txt">Save Changes</span>
          </button>
        </div>
        <div class="prof-form">
          <div class="fi-2">
            <div class="field">
              <label id="lbl-name">Full Name</label>
              <input class="fi" type="text" id="prof-name" placeholder="Your full name">
            </div>
            <div class="field">
              <label id="lbl-phone">Phone Number</label>
              <input class="fi" type="tel" id="prof-phone" placeholder="+20 1XX XXX XXXX">
            </div>
          </div>
          <div class="fi-2">
            <div class="field">
              <label id="lbl-email">Email Address</label>
              <input class="fi" type="email" id="prof-email" placeholder="your@email.com">
            </div>
            <div class="field">
              <label id="lbl-lang">Preferred Language</label>
              <select class="fi" id="prof-lang">
                <option value="en">English</option>
                <option value="ar">العربية (Arabic)</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <!-- Change Password -->
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="pass-title">Change Password</h3>
          <button class="btn-sm btn-teal" onclick="savePassword()" id="save-pass-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <span id="save-pass-txt">Update Password</span>
          </button>
        </div>
        <div class="prof-form">
          <div class="fi-2">
            <div class="field">
              <label id="lbl-curr-pass">Current Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="curr-pass" placeholder="••••••••">
                <button class="eye-btn" type="button" onclick="toggleEye('curr-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
            <div></div>
            <div class="field">
              <label id="lbl-new-pass">New Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="new-pass" placeholder="Min. 8 characters">
                <button class="eye-btn" type="button" onclick="toggleEye('new-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
            <div class="field">
              <label id="lbl-conf-pass">Confirm New Password</label>
              <div class="pass-wrap">
                <input class="fi" type="password" id="conf-pass" placeholder="Repeat new password">
                <button class="eye-btn" type="button" onclick="toggleEye('conf-pass',this)">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Danger Zone -->
      <div class="sec-card" style="border-color:#FECACA">
        <div class="sec-head" style="border-color:#FECACA">
          <h3 style="color:var(--err)" id="danger-title">Danger Zone</h3>
        </div>
        <div style="padding:1.2rem 1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.8rem">
          <div>
            <div style="font-weight:600;font-size:.88rem;color:var(--navy)" id="del-acc-title">Delete Account</div>
            <div style="font-size:.8rem;color:var(--muted);margin-top:.15rem" id="del-acc-sub">Permanently delete your account and all your data</div>
          </div>
          <button class="btn-sm btn-red" onclick="confirmDeleteAccount()" id="del-acc-btn">Delete Account</button>
        </div>
      </div>

    </div><!-- end tab-profile -->
  </div><!-- end main -->
</div><!-- end layout -->

<!-- WRITE REVIEW MODAL -->
<div class="ov" id="reviewModal" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="modal">
    <div class="mh">
      <h3 id="wr-modal-title">Write a Review</h3>
      <button class="mclose" onclick="document.getElementById('reviewModal').classList.remove('open')">✕</button>
    </div>
    <div class="mb">
      <div class="field">
        <label id="wr-school-lbl">School</label>
        <select class="fi" id="wr-school">
          <option value="">Loading schools...</option>
        </select>
      </div>
      <div class="field">
        <label id="wr-rating-lbl">Rating</label>
        <div class="star-r" id="wr-stars">
          <span class="star" onclick="setRevStar(1)" id="wrs1">★</span>
          <span class="star" onclick="setRevStar(2)" id="wrs2">★</span>
          <span class="star" onclick="setRevStar(3)" id="wrs3">★</span>
          <span class="star" onclick="setRevStar(4)" id="wrs4">★</span>
          <span class="star" onclick="setRevStar(5)" id="wrs5">★</span>
        </div>
      </div>
      <div class="field">
        <label id="wr-text-lbl">Your Review</label>
        <textarea class="fi" id="wr-text" rows="4" placeholder="Share your experience about this school..." style="resize:none"></textarea>
      </div>
      <button class="sub-btn" onclick="submitMyReview()" id="wr-submit-btn">Submit Review</button>
    </div>
  </div>
</div>

<!-- BOOKING MODAL -->
<div class="ov" id="bookingMod" onclick="closeBookingMod(event)">
  <div class="modal" style="max-width:460px" onclick="event.stopPropagation()">
    <div class="mh">
      <h3 id="bk-title">Book a School Visit</h3>
      <button class="mclose" onclick="closeBookingMod()">✕</button>
    </div>
    <div class="mb">
      <div class="field">
        <label id="bk-school-lbl">School</label>
        <select id="bk-school" class="fi">
          <option value="" id="bk-school-opt">Select a school...</option>
        </select>
      </div>
      <div class="field">
        <label id="bk-date-lbl">Preferred Visit Date</label>
        <input type="date" id="bk-date" class="fi">
      </div>
      <div class="field">
        <label id="bk-msg-lbl">Message <span style="font-weight:400;color:var(--muted)">(optional)</span></label>
        <textarea id="bk-msg" class="fi" rows="3" placeholder="Any questions or special requests..." style="resize:none"></textarea>
      </div>
      <button class="sub-btn" style="width:100%;margin-top:.2rem" onclick="submitBooking()" id="bk-submit-txt">Send Request</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
/* ── Token expiry check (async) ── */
(function(){
  const token = localStorage.getItem('sf_token');
  if (!token) return;
  fetch('/api/auth/me', { headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' } })
    .then(r => { if (r.status === 401) { localStorage.removeItem('sf_token'); window.location.replace('/login'); } });
})();

/* ═══════════════════════════════════════
   DATA
   ═══════════════════════════════════════ */
let MY_FAVS    = [];
let MY_REVIEWS = [];
let MY_APPTS   = [];
let MY_NOTIFS  = [];
const API_BASE = '/api';
const getToken = () => localStorage.getItem('sf_token');
const authHeaders = () => ({ 'Content-Type': 'application/json', 'Authorization': `Bearer ${getToken()}`, 'Accept': 'application/json' });
const typeBadge = tp => ({ British:'cb-british', American:'cb-american', German:'cb-german', French:'cb-french' }[tp] || 'cb-british');

/* ═══════════════════════════════════════
   TRANSLATIONS
   ═══════════════════════════════════════ */
const TR = {
  en:{
    "sl-overview":"Overview","sl-favorites":"Favorites","sl-reviews":"My Reviews",
    "sl-appointments":"Appointments","sl-notifications":"Notifications","sl-profile":"Edit Profile",
    "nav-browse":"← Browse Schools","nav-logout":"Logout",
    "us-favs-lbl":"Favorites","us-revs-lbl":"Reviews","us-appts-lbl":"Appts",
    "ov-tag":"Overview",
    "ov-fav-l":"Saved Schools","ov-rev-l":"Reviews Written","ov-appt-l":"Appointments",
    "ov-recent-title":"Recently Saved","ov-view-all":"View All →",
    "ov-appts-title":"Upcoming Appointments","ov-view-appts":"View All →",
    "fav-title":"My Favorite Schools","fav-add-txt":"Add More Schools",
    "favs-empty-title":"No favorites yet","favs-empty-sub":"Browse schools and save the ones you like","favs-empty-link":"Browse Schools →",
    "rev-page-title":"My Reviews","write-rev-txt":"Write a Review",
    "revs-empty-title":"No reviews yet","revs-empty-sub":"Share your experience to help other parents",
    "appt-page-title":"My Appointments","book-appt-txt":"Book New Appointment",
    "appts-empty-title":"No appointments yet","appts-empty-sub":"Book a visit to a school from its profile page","appts-empty-link":"Browse Schools →",
    "notif-page-title":"Notifications","mark-all-btn":"Mark all as read",
    "notifs-empty-title":"No notifications","notifs-empty-sub":"You're all caught up!",
    "prof-title":"Personal Information","save-prof-txt":"Save Changes",
    "lbl-name":"Full Name","lbl-phone":"Phone Number","lbl-email":"Email Address","lbl-lang":"Preferred Language",
    "pass-title":"Change Password","save-pass-txt":"Update Password",
    "lbl-curr-pass":"Current Password","lbl-new-pass":"New Password","lbl-conf-pass":"Confirm New Password",
    "danger-title":"Danger Zone","del-acc-title":"Delete Account",
    "del-acc-sub":"Permanently delete your account and all your data","del-acc-btn":"Delete Account",
    "wr-modal-title":"Write a Review","wr-school-lbl":"School","wr-rating-lbl":"Rating","wr-text-lbl":"Your Review","wr-submit-btn":"Submit Review",
    removeFav:"Removed from favorites",cancelAppt:"Appointment cancelled.",
    ok_profile:"Profile updated!",ok_password:"Password updated!",
    err_pass_match:"Passwords do not match.",err_curr_pass:"Please enter your current password.",err_new_pass:"New password must be at least 8 characters.",
    ok_review:"Review submitted! Pending approval.",del_acc_confirm:"Are you sure? This cannot be undone.",
    err_star:"Please select a star rating.",err_review:"Please write your review.",
    feeLabel:"/ year",
    "bk-title":"Book a School Visit","bk-school-lbl":"School","bk-school-opt":"Select a school...",
    "bk-date-lbl":"Preferred Visit Date","bk-msg-lbl":"Message (optional)","bk-submit-txt":"Send Request",
  },
  ar:{
    "sl-overview":"نظرة عامة","sl-favorites":"المفضلة","sl-reviews":"تقييماتي",
    "sl-appointments":"المواعيد","sl-notifications":"الإشعارات","sl-profile":"تعديل الملف",
    "nav-browse":"← تصفح المدارس","nav-logout":"تسجيل الخروج",
    "us-favs-lbl":"مفضلة","us-revs-lbl":"تقييمات","us-appts-lbl":"مواعيد",
    "ov-tag":"نظرة عامة",
    "ov-fav-l":"مدارس محفوظة","ov-rev-l":"تقييمات مكتوبة","ov-appt-l":"مواعيد",
    "ov-recent-title":"المحفوظة مؤخراً","ov-view-all":"عرض الكل →",
    "ov-appts-title":"المواعيد القادمة","ov-view-appts":"عرض الكل →",
    "fav-title":"مدارسي المفضلة","fav-add-txt":"إضافة مدارس",
    "favs-empty-title":"لا توجد مفضلة بعد","favs-empty-sub":"تصفح المدارس واحفظ ما يعجبك","favs-empty-link":"تصفح المدارس →",
    "rev-page-title":"تقييماتي","write-rev-txt":"كتابة تقييم",
    "revs-empty-title":"لا توجد تقييمات بعد","revs-empty-sub":"شارك تجربتك لمساعدة أولياء الأمور الآخرين",
    "appt-page-title":"مواعيدي","book-appt-txt":"حجز موعد جديد",
    "appts-empty-title":"لا توجد مواعيد بعد","appts-empty-sub":"احجز زيارة من صفحة ملف المدرسة","appts-empty-link":"تصفح المدارس →",
    "notif-page-title":"الإشعارات","mark-all-btn":"تعليم الكل كمقروء",
    "notifs-empty-title":"لا توجد إشعارات","notifs-empty-sub":"أنت على اطلاع كامل!",
    "prof-title":"المعلومات الشخصية","save-prof-txt":"حفظ التغييرات",
    "lbl-name":"الاسم الكامل","lbl-phone":"رقم الهاتف","lbl-email":"البريد الإلكتروني","lbl-lang":"اللغة المفضلة",
    "pass-title":"تغيير كلمة المرور","save-pass-txt":"تحديث كلمة المرور",
    "lbl-curr-pass":"كلمة المرور الحالية","lbl-new-pass":"كلمة المرور الجديدة","lbl-conf-pass":"تأكيد كلمة المرور الجديدة",
    "danger-title":"منطقة الخطر","del-acc-title":"حذف الحساب",
    "del-acc-sub":"حذف حسابك وجميع بياناتك بشكل دائم","del-acc-btn":"حذف الحساب",
    "wr-modal-title":"كتابة تقييم","wr-school-lbl":"المدرسة","wr-rating-lbl":"التقييم","wr-text-lbl":"تقييمك","wr-submit-btn":"إرسال التقييم",
    removeFav:"تم الإزالة من المفضلة",cancelAppt:"تم إلغاء الموعد.",
    ok_profile:"تم تحديث الملف الشخصي!",ok_password:"تم تحديث كلمة المرور!",
    err_pass_match:"كلمتا المرور غير متطابقتين.",err_curr_pass:"يرجى إدخال كلمة المرور الحالية.",err_new_pass:"يجب أن تكون كلمة المرور الجديدة 8 أحرف على الأقل.",
    ok_review:"تم إرسال التقييم! في انتظار الموافقة.",del_acc_confirm:"هل أنت متأكد؟ لا يمكن التراجع عن هذا.",
    err_star:"يرجى اختيار عدد النجوم.",err_review:"يرجى كتابة تقييمك.",
    feeLabel:"/ سنة",
    "bk-title":"حجز زيارة مدرسية","bk-school-lbl":"المدرسة","bk-school-opt":"اختر مدرسة...",
    "bk-date-lbl":"تاريخ الزيارة المفضل","bk-msg-lbl":"رسالة (اختياري)","bk-submit-txt":"إرسال الطلب",
  }
};

/* ═══════════════════════════════════════
   STATE
   ═══════════════════════════════════════ */
let lang = localStorage.getItem('sf_locale') || window.APP_LOCALE || 'en', activeTab='overview', revStar=0;
const t = k => (TR[lang][k] || TR.en[k] || k);

/* ═══════════════════════════════════════
   LANGUAGE
   ═══════════════════════════════════════ */
function toggleLang(){
  lang = lang==='en'?'ar':'en';
  document.documentElement.lang=lang;
  document.documentElement.dir=lang==='ar'?'rtl':'ltr';
  document.getElementById('lang-lbl').textContent=lang==='en'?'EN':'AR';
  applyTR();
  renderCurrentTab();
}
function applyTR(){
  Object.keys(TR.en).forEach(k=>{
    if(k.startsWith('err_')||k.startsWith('ok_')||k==='removeFav'||k==='cancelAppt'||k==='feeLabel'||k==='del_acc_confirm') return;
    const el=document.getElementById(k);
    if(el) el.textContent=t(k);
  });
  // placeholders (cannot be set via textContent)
  const bkMsg=document.getElementById('bk-msg');
  if(bkMsg) bkMsg.placeholder=lang==='ar'?'أي أسئلة أو طلبات خاصة...':'Any questions or special requests...';
  const wrTxt=document.getElementById('wr-text');
  if(wrTxt) wrTxt.placeholder=lang==='ar'?'شارك تجربتك حول هذه المدرسة...':'Share your experience about this school...';
  // select default option text
  const bkOpt=document.getElementById('bk-school-opt');
  if(bkOpt) bkOpt.textContent=t('bk-school-opt');
  updateOverviewTitle();
}

/* ═══════════════════════════════════════
   TAB SWITCHING
   ═══════════════════════════════════════ */
const TABS=['overview','favorites','reviews','appointments','notifications','profile'];
function showTab(tab, el=null){
  TABS.forEach(tb=>{ const e=document.getElementById('tab-'+tb); if(e) e.style.display=tb===tab?'block':'none'; });
  document.querySelectorAll('.sb-item').forEach(i=>i.classList.remove('act'));
  const si=el||document.getElementById('si-'+tab);
  if(si) si.classList.add('act');
  activeTab=tab;
  renderCurrentTab();
  window.scrollTo({top:0,behavior:'smooth'});
}
function renderCurrentTab(){
  if(activeTab==='overview')       { renderRecentFavs(); renderUpcomingAppts(); updateOverviewTitle(); }
  if(activeTab==='favorites')      renderFavs();
  if(activeTab==='reviews')        renderReviews();
  if(activeTab==='appointments')   renderAppts();
  if(activeTab==='notifications')  renderNotifs();
}

/* ═══════════════════════════════════════
   OVERVIEW
   ═══════════════════════════════════════ */
function updateOverviewTitle(){
  const name = document.getElementById('prof-name')?.value || 'there';
  const firstName = name.split(' ')[0];
  document.getElementById('ov-title').textContent = lang==='ar' ? `مرحباً بعودتك، ${firstName} 👋` : `Welcome back, ${firstName} 👋`;
  document.getElementById('ov-fav-n').textContent  = MY_FAVS.length;
  document.getElementById('ov-rev-n').textContent  = MY_REVIEWS.length;
  document.getElementById('ov-appt-n').textContent = MY_APPTS.length;
  document.getElementById('us-favs').textContent   = MY_FAVS.length;
  document.getElementById('us-revs').textContent   = MY_REVIEWS.length;
  document.getElementById('us-appts').textContent  = MY_APPTS.length;
  document.getElementById('fav-badge').textContent  = MY_FAVS.length;
  const pendingCount = MY_APPTS.filter(a=>a.status==='pending').length;
  document.getElementById('appt-badge').textContent = pendingCount;
  document.getElementById('appt-badge').style.display = pendingCount ? 'inline-block' : 'none';
  const unread = MY_NOTIFS.filter(n=>!n.read).length;
  document.getElementById('notif-badge').textContent = unread;
  document.getElementById('notif-badge').style.display = unread ? 'inline-block' : 'none';
  document.getElementById('notif-nav-dot').style.display = unread ? 'block' : 'none';
}

function renderRecentFavs(){
  const schools = MY_FAVS.slice(0,3);
  const grid = document.getElementById('recent-favs-grid');
  grid.innerHTML = schools.length
    ? schools.map(s=>schoolCard(s)).join('')
    : `<div class="empty" style="padding:2rem"><div class="empty-icon">❤️</div><h4>${lang==='ar'?'لا توجد مفضلة بعد':'No favorites yet'}</h4></div>`;
}

function renderUpcomingAppts(){
  const upcoming = MY_APPTS.filter(a=>a.status==='pending').slice(0,3);
  document.getElementById('upcoming-appts').innerHTML = upcoming.length
    ? upcoming.map(a=>apptItem(a)).join('')
    : `<div class="empty"><div class="empty-icon">✅</div><h4>${lang==='ar'?'لا مواعيد قادمة':'No upcoming appointments'}</h4></div>`;
}

/* ═══════════════════════════════════════
   FAVORITES
   ═══════════════════════════════════════ */
function renderFavs(){
  const grid=document.getElementById('favs-grid');
  const empty=document.getElementById('favs-empty');
  if(!MY_FAVS.length){ grid.innerHTML=''; empty.style.display='block'; return; }
  empty.style.display='none';
  grid.innerHTML=MY_FAVS.map(s=>schoolCard(s)).join('');
}

function schoolCard(s){
  const badge = s.badge || typeBadge(s.type);
  const fee   = s.feeDisp || s.feeDisplay || '';
  const curricula = Array.isArray(s.curricula) ? s.curricula : [];
  return `
  <div class="school-card">
    <div class="sc-top">
      <span class="cbadge ${badge}">${s.type||''}</span>
      <div class="rem-btn" onclick="removeFav(${s.id})" title="${t('removeFav')}">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </div>
    </div>
    <div class="sc-body">
      <div class="sc-name">${s.name}</div>
      <div class="sc-loc">
        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        ${s.area||''}
      </div>
      <div style="display:flex;flex-wrap:wrap;gap:.3rem;margin-bottom:.6rem">
        ${curricula.map(c=>`<span class="tag">${c}</span>`).join('')}
      </div>
      <div style="display:flex;justify-content:space-between;align-items:center;padding-top:.6rem;border-top:1px solid #F0F6FF">
        <div><div class="sc-fee">${fee}</div><div class="sc-fee-sub">${t('feeLabel')}</div></div>
        <div class="sc-rating">★ ${s.rating||'—'}</div>
      </div>
    </div>
  </div>`;
}

async function removeFav(id){
  try{
    await fetch(`${API_BASE}/favorites/${id}`,{method:'DELETE',headers:authHeaders()});
  }catch(e){}
  MY_FAVS=MY_FAVS.filter(s=>s.id!==id);
  updateOverviewTitle();
  renderFavs();
  renderRecentFavs();
  toast(t('removeFav'),'inf');
}

async function loadMyFavs(){
  if(!getToken()) return;
  try{
    const res=await fetch(`${API_BASE}/favorites`,{headers:authHeaders()});
    const json=await res.json();
    if(json.success){ MY_FAVS=json.data||[]; updateOverviewTitle(); if(activeTab==='favorites') renderFavs(); renderRecentFavs(); }
  }catch(e){ console.error('Failed to load favorites',e); }
}

/* ═══════════════════════════════════════
   REVIEWS
   ═══════════════════════════════════════ */
function renderReviews(){
  const list=document.getElementById('reviews-list');
  const empty=document.getElementById('revs-empty');
  if(!MY_REVIEWS.length){ list.innerHTML=''; empty.style.display='block'; return; }
  empty.style.display='none';
  list.innerHTML=MY_REVIEWS.map(r=>`
    <div class="review-item">
      <div class="rv-top">
        <div>
          <span class="rv-school">${r.school_name||r.school||''}</span>
          <span class="rv-status ${r.is_approved?'st-approved':'st-pending'}">${r.is_approved?(lang==='ar'?'مقبول':'Approved'):(lang==='ar'?'قيد الانتظار':'Pending')}</span>
          ${r.is_verified?`<span style="background:#E8F5F2;color:var(--teal);font-size:.68rem;font-weight:700;padding:.15rem .55rem;border-radius:20px;margin-left:.3rem;font-family:'Sora',sans-serif">${lang==='ar'?'✓ موثّق':'✓ Verified'}</span>`:''}
        </div>
        <div class="rv-date">${r.date||''}</div>
      </div>
      <div class="rv-stars">${'★'.repeat(r.rating)}${'☆'.repeat(5-r.rating)}</div>
      <div class="rv-text">${r.comment||r.text||''}</div>
    </div>`).join('');
}

async function loadMyReviews(){
  if(!getToken()) return;
  try{
    const res=await fetch(`${API_BASE}/user/reviews`,{headers:authHeaders()});
    const json=await res.json();
    if(json.success){ MY_REVIEWS=json.data||[]; updateOverviewTitle(); if(activeTab==='reviews') renderReviews(); }
  }catch(e){ console.error('Failed to load reviews',e); }
}

function openWriteReview(){
  revStar=0;
  document.getElementById('wr-text').value='';
  for(let i=1;i<=5;i++) document.getElementById('wrs'+i).className='star';
  document.getElementById('reviewModal').classList.add('open');
}
function setRevStar(n){ revStar=n; for(let i=1;i<=5;i++) document.getElementById('wrs'+i).className='star'+(i<=n?' on':''); }

async function submitMyReview(){
  if(!revStar){ toast(t('err_star'),'err'); return; }
  const comment=document.getElementById('wr-text').value.trim();
  if(!comment){ toast(t('err_review'),'err'); return; }
  const schoolId=document.getElementById('wr-school').value;
  if(!schoolId){ toast(lang==='ar'?'يرجى اختيار مدرسة':'Please select a school','err'); return; }
  const btn=document.getElementById('wr-submit-btn');
  btn.disabled=true;
  try{
    const res=await fetch(`${API_BASE}/schools/${schoolId}/reviews`,{
      method:'POST', headers:authHeaders(),
      body:JSON.stringify({rating:revStar, comment})
    });
    const json=await res.json();
    if(json.success){
      document.getElementById('reviewModal').classList.remove('open');
      toast(t('ok_review'),'ok');
      await loadMyReviews();
    } else {
      toast(json.message||'Error submitting review','err');
    }
  }catch(e){ toast('Network error','err'); }
  finally{ btn.disabled=false; }
}

async function populateSchoolSelect(){
  try{
    const res=await fetch(`${API_BASE}/schools?per_page=50`);
    const json=await res.json();
    if(json.success){
      const sel=document.getElementById('wr-school');
      sel.innerHTML=json.data.map(s=>`<option value="${s.id}">${s.name}</option>`).join('');
    }
  }catch(e){ console.error('Failed to load schools for select',e); }
}

/* ═══════════════════════════════════════
   APPOINTMENTS
   ═══════════════════════════════════════ */
function renderAppts(){
  const list=document.getElementById('appts-list');
  const empty=document.getElementById('appts-empty');
  if(!MY_APPTS.length){ list.innerHTML=''; empty.style.display='block'; return; }
  empty.style.display='none';
  list.innerHTML=MY_APPTS.map(a=>apptItem(a)).join('');
}
function apptItem(a){
  const extra = a.status==='confirmed'&&a.confirmed_date
    ? `<div style="font-size:.78rem;color:#065F46;margin-top:.2rem">${lang==='ar'?'✓ مؤكد في':'✓ Confirmed for'} ${a.confirmed_date}</div>`
    : a.status==='cancelled'&&a.cancel_reason
    ? `<div style="font-size:.78rem;color:#991B1B;margin-top:.2rem">${a.cancel_reason}</div>`
    : a.status==='attention'&&a.attention_note
    ? `<div style="font-size:.78rem;color:#1D4ED8;margin-top:.2rem">⚠️ ${a.attention_note}</div>`
    : '';
  return `<div class="appt-item">
    <div class="appt-info">
      <div class="appt-school">${a.school||a.school_name||''}</div>
      <div class="appt-date">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        ${a.date||''}
      </div>
      <div class="appt-msg">${a.msg||a.message||''}</div>
      ${extra}
    </div>
    <div style="display:flex;align-items:center;gap:.6rem">
      <span class="appt-badge ab-${a.status}">${{pending:lang==='ar'?'قيد الانتظار':'Pending',confirmed:lang==='ar'?'مؤكد':'Confirmed',cancelled:lang==='ar'?'ملغي':'Cancelled',attention:lang==='ar'?'يحتاج انتباهاً':'Attention'}[a.status]||a.status}</span>
      ${a.status==='pending'?`<button class="btn-sm btn-red" onclick="cancelAppt(${a.id})" style="font-size:.75rem">${lang==='ar'?'إلغاء':'Cancel'}</button>`:''}
    </div>
  </div>`;
}
async function cancelAppt(id){
  try{
    const res=await fetch(`${API_BASE}/appointments/${id}/cancel`,{method:'PUT',headers:authHeaders()});
    const json=await res.json();
    if(!json.success){ toast(json.message||'Failed to cancel','err'); return; }
  }catch(e){ toast('Network error','err'); return; }
  const a=MY_APPTS.find(x=>x.id===id);
  if(a){ a.status='cancelled'; renderAppts(); renderUpcomingAppts(); updateOverviewTitle(); toast(t('cancelAppt'),'inf'); }
}

async function loadMyAppts(){
  if(!getToken()) return;
  try{
    const res=await fetch(`${API_BASE}/appointments`,{headers:authHeaders()});
    const json=await res.json();
    if(json.success){ MY_APPTS=json.data||[]; updateOverviewTitle(); if(activeTab==='appointments') renderAppts(); renderUpcomingAppts(); }
  }catch(e){ console.error('Failed to load appointments',e); }
}

/* ═══════════════════════════════════════
   NOTIFICATIONS
   ═══════════════════════════════════════ */
function renderNotifs(){
  const list=document.getElementById('notifs-list');
  const empty=document.getElementById('notifs-empty');
  if(!MY_NOTIFS.length){ list.innerHTML=''; empty.style.display='block'; return; }
  empty.style.display='none';
  list.innerHTML=MY_NOTIFS.map(n=>`
    <div class="notif-item ${n.read?'':'unread'}" onclick="markRead(${n.id})">
      <div class="notif-dot2 ${n.read?'read':''}"></div>
      <div style="flex:1">
        <div class="notif-title">${n.title||''}</div>
        <div class="notif-msg">${n.msg||n.message||''}</div>
        <div class="notif-time">${n.time||n.created_at||''}</div>
      </div>
    </div>`).join('');
}
async function markRead(id){
  const n=MY_NOTIFS.find(x=>x.id===id);
  if(!n||n.read) return;
  try{ await fetch(`${API_BASE}/notifications/${id}/read`,{method:'PUT',headers:authHeaders()}); }catch(e){}
  n.read=true; renderNotifs(); updateOverviewTitle();
}
async function markAllRead(){
  try{ await fetch(`${API_BASE}/notifications/read-all`,{method:'PUT',headers:authHeaders()}); }catch(e){}
  MY_NOTIFS.forEach(n=>n.read=true);
  renderNotifs(); updateOverviewTitle();
  toast(lang==='ar'?'تم تعليم الكل كمقروء':'All marked as read','ok');
}

async function loadMyNotifs(){
  if(!getToken()) return;
  try{
    const res=await fetch(`${API_BASE}/notifications`,{headers:authHeaders()});
    const json=await res.json();
    if(json.success){ MY_NOTIFS=json.data||[]; updateOverviewTitle(); if(activeTab==='notifications') renderNotifs(); }
  }catch(e){ console.error('Failed to load notifications',e); }
}

async function refreshUnreadBadge(){
  if(!getToken()) return;
  try{
    const res=await fetch(`${API_BASE}/notifications/unread-count`,{headers:authHeaders()});
    const json=await res.json();
    if(json.success){
      const count=json.data.count;
      document.getElementById('notif-badge').textContent=count;
      document.getElementById('notif-badge').style.display=count?'inline-block':'none';
      document.getElementById('notif-nav-dot').style.display=count?'block':'none';
    }
  }catch(e){}
}

/* ═══════════════════════════════════════
   PROFILE
   ═══════════════════════════════════════ */
async function saveProfile(){
  const name=document.getElementById('prof-name').value.trim();
  if(!name){ toast(lang==='ar'?'يرجى إدخال اسمك':'Please enter your name','err'); return; }
  const phone=document.getElementById('prof-phone')?.value.trim()||null;
  const language=document.getElementById('prof-lang')?.value||null;
  const btn=document.getElementById('save-prof-btn');
  btn.disabled=true;
  try{
    const res=await fetch(`${API_BASE}/auth/profile`,{method:'PUT',headers:authHeaders(),body:JSON.stringify({name,phone,language})});
    const json=await res.json();
    if(json.success){
      const initials=name.split(' ').map(w=>w[0]).slice(0,2).join('').toUpperCase();
      document.getElementById('user-avatar').textContent=initials;
      document.getElementById('user-name').textContent=name;
      const stored=JSON.parse(localStorage.getItem('sf_user')||'{}');
      localStorage.setItem('sf_user',JSON.stringify({...stored,name}));
      updateOverviewTitle();
      toast(t('ok_profile'),'ok');
    } else toast(json.message||'Error','err');
  }catch(e){ toast('Network error','err'); }
  finally{ btn.disabled=false; }
}

async function savePassword(){
  const curr=document.getElementById('curr-pass').value;
  const nw=document.getElementById('new-pass').value;
  const conf=document.getElementById('conf-pass').value;
  if(!curr){ toast(t('err_curr_pass'),'err'); return; }
  if(nw.length<8){ toast(t('err_new_pass'),'err'); return; }
  if(nw!==conf){ toast(t('err_pass_match'),'err'); return; }
  const btn=document.getElementById('save-pass-btn');
  btn.disabled=true;
  try{
    const res=await fetch(`${API_BASE}/auth/password`,{method:'PUT',headers:authHeaders(),
      body:JSON.stringify({current_password:curr,new_password:nw,new_password_confirmation:conf})});
    const json=await res.json();
    if(json.success){
      ['curr-pass','new-pass','conf-pass'].forEach(id=>document.getElementById(id).value='');
      toast(t('ok_password'),'ok');
    } else toast(json.message||'Error','err');
  }catch(e){ toast('Network error','err'); }
  finally{ btn.disabled=false; }
}

function toggleEye(id,btn){
  const inp=document.getElementById(id);
  inp.type=inp.type==='password'?'text':'password';
  btn.innerHTML=inp.type==='text'
    ?`<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
    :`<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
}

async function confirmDeleteAccount(){
  const r = await sfConfirm(
    'This will permanently delete your account and all your data. This cannot be undone.',
    'Delete Account',
    '⚠️',
    true
  );
  if (r.action === 'confirm') doLogout();
}

/* ═══════════════════════════════════════
   LOGOUT
   ═══════════════════════════════════════ */
function doLogout(){
  localStorage.removeItem('sf_token');
  localStorage.removeItem('sf_user');
  window.location.href='/login';
}

/* ═══════════════════════════════════════
   TOAST
   ═══════════════════════════════════════ */
let ttimer;
function toast(msg,type='inf'){
  const el=document.getElementById('toast');
  el.textContent=msg; el.className=`toast show ${type}`;
  clearTimeout(ttimer);
  ttimer=setTimeout(()=>el.className='toast',2600);
}

/* ═══════════════════════════════════════
   INIT
   ═══════════════════════════════════════ */
// Populate from localStorage immediately (fast render)
const sfUser = JSON.parse(localStorage.getItem('sf_user')||'null');
if(sfUser){
  if(sfUser.name){
    document.getElementById('user-name').textContent=sfUser.name;
    document.getElementById('prof-name').value=sfUser.name;
    const initials=sfUser.name.split(' ').map(w=>w[0]).slice(0,2).join('').toUpperCase();
    document.getElementById('user-avatar').textContent=initials;
  }
  if(sfUser.email){
    document.getElementById('user-email').textContent=sfUser.email;
    document.getElementById('prof-email').value=sfUser.email;
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
async function openBookingModal(){
  const sel = document.getElementById('bk-school');
  // Load schools into dropdown only once
  if(sel.options.length <= 1){
    try{
      const res  = await fetch(`${API_BASE}/schools?per_page=100`);
      const json = await res.json();
      if(json.success)(json.data || []).forEach(s => {
        const opt = document.createElement('option');
        opt.value = s.id;
        opt.textContent = s.name;
        sel.appendChild(opt);
      });
    }catch(e){}
  }
  // Set minimum date to tomorrow
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  document.getElementById('bk-date').min = tomorrow.toISOString().split('T')[0];
  document.getElementById('bk-date').value = '';
  document.getElementById('bk-msg').value  = '';
  document.getElementById('bookingMod').classList.add('open');
}

function closeBookingMod(e){
  if(!e || e.target === document.getElementById('bookingMod')){
    document.getElementById('bookingMod').classList.remove('open');
  }
}

async function submitBooking(){
  const schoolId = document.getElementById('bk-school').value;
  const date     = document.getElementById('bk-date').value;
  const msg      = document.getElementById('bk-msg').value.trim();
  if(!schoolId){ toast(lang==='ar'?'يرجى اختيار مدرسة':'Please select a school','err'); return; }
  if(!date)    { toast(lang==='ar'?'يرجى اختيار تاريخ':'Please select a date','err'); return; }
  const btn = document.querySelector('#bookingMod .sub-btn');
  btn.disabled = true;
  btn.textContent = '...';
  try{
    const res  = await fetch(`${API_BASE}/appointments`,{
      method:'POST', headers:authHeaders(),
      body:JSON.stringify({ school_id:parseInt(schoolId), preferred_date:date, message:msg||null }),
    });
    const json = await res.json();
    if(res.ok && json.success){
      toast(lang==='ar'?'تم حجز الموعد!':'Appointment booked!','ok');
      document.getElementById('bookingMod').classList.remove('open');
      loadMyAppts();
    } else {
      toast(json.message||'Failed to book appointment','err');
    }
  }catch(e){ toast('Network error','err'); }
  finally{
    btn.disabled = false;
    btn.textContent = lang==='ar'?'إرسال الطلب':'Send Request';
  }
}

// Refresh profile from API and update UI
if(getToken()){
  fetch(`${API_BASE}/auth/me`,{headers:authHeaders()})
    .then(r=>r.json())
    .then(json=>{
      if(!json.success) return;
      const u=json.data||json.user||{};
      if(u.name){
        document.getElementById('user-name').textContent=u.name;
        document.getElementById('prof-name').value=u.name;
        const initials=u.name.split(' ').map(w=>w[0]).slice(0,2).join('').toUpperCase();
        document.getElementById('user-avatar').textContent=initials;
        updateOverviewTitle();
      }
      if(u.email){
        document.getElementById('user-email').textContent=u.email;
        document.getElementById('prof-email').value=u.email;
      }
      if(u.phone && document.getElementById('prof-phone')){
        document.getElementById('prof-phone').value=u.phone;
      }
    })
    .catch(()=>{});
}
</script>

</body>
</html>
