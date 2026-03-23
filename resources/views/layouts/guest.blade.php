<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    window.APP_LOCALE = "{{ app()->getLocale() }}";
    window.IS_RTL     = {{ app()->getLocale() === 'ar' ? 'true' : 'false' }};
    window.LANG       = @json(trans('messages'));
</script>
<title>@yield('title', 'SchoolFinder Egypt')</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root{--navy:#0F2942;--blue:#1A5276;--teal:#148F77;--td:#117a65;--light:#F0F6FF;--text:#1C2B3A;--muted:#5D7285;--border:#D6E4F0;--bg:#F0F4F8;--warn:#E67E22;--err:#e74c3c;--ok:#148F77;}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;display:flex;flex-direction:column;}
h1,h2,h3,h4,h5{font-family:'Sora',sans-serif;}
/* NAV */
nav{background:var(--navy);position:sticky;top:0;z-index:50;}
.nav-i{max-width:1200px;margin:0 auto;padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;}
.logo{display:flex;align-items:center;gap:.6rem;text-decoration:none;}
.logo-icon{width:36px;height:36px;background:linear-gradient(135deg,var(--teal),#1abc9c);border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:'Sora',sans-serif;font-weight:800;color:white;font-size:1rem;}
.logo-txt{font-family:'Sora',sans-serif;font-weight:700;font-size:1.05rem;color:white;}
.logo-txt span{color:#52d9bd;}
.lang-btn{display:flex;align-items:center;gap:.35rem;padding:.3rem .75rem;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.15);border-radius:8px;cursor:pointer;color:#a8c4d8;font-size:.8rem;font-weight:600;transition:all .2s;}
.lang-btn:hover{border-color:var(--teal);color:#52d9bd;}
/* LAYOUT */
.main{flex:1;display:flex;align-items:stretch;}
.wrap{display:grid;grid-template-columns:400px 1fr;width:100%;min-height:calc(100vh - 56px);}
/* LEFT PANEL */
.panel-left{background:linear-gradient(160deg,var(--navy) 0%,#1a3a5c 100%);padding:3rem 2.5rem;display:flex;flex-direction:column;justify-content:space-between;position:relative;overflow:hidden;}
.panel-left::before{content:'';position:absolute;top:-80px;right:-80px;width:300px;height:300px;background:radial-gradient(circle,rgba(20,143,119,.2) 0%,transparent 70%);border-radius:50%;}
.panel-left-inner{position:relative;z-index:1;}
.panel-badge{display:inline-flex;align-items:center;gap:.4rem;background:rgba(20,143,119,.2);border:1px solid rgba(20,143,119,.4);border-radius:20px;padding:.3rem .85rem;font-size:.75rem;font-weight:600;color:#52d9bd;margin-bottom:1.5rem;}
.panel-left h2{font-size:1.7rem;font-weight:800;color:white;line-height:1.25;margin-bottom:.9rem;}
.panel-left h2 span{color:#52d9bd;}
.panel-left p{font-size:.88rem;color:#a8c4d8;line-height:1.7;margin-bottom:1.8rem;}
.feature-list{display:flex;flex-direction:column;gap:.7rem;}
.feature{display:flex;align-items:flex-start;gap:.65rem;font-size:.86rem;color:#c8dde8;}
.feature-dot{width:20px;height:20px;background:rgba(20,143,119,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:.1rem;}
.panel-stats{display:flex;gap:2rem;border-top:1px solid rgba(255,255,255,.1);padding-top:1.5rem;position:relative;z-index:1;}
.pstat{text-align:center;}
.pstat-n{font-family:'Sora',sans-serif;font-weight:800;font-size:1.4rem;color:white;}
.pstat-l{font-size:.75rem;color:#52d9bd;margin-top:.15rem;}
/* RIGHT PANEL */
.panel-right{background:white;padding:3rem 2.8rem;display:flex;flex-direction:column;overflow-y:auto;}
.form-header{margin-bottom:1.5rem;}
.form-header h3{font-size:1.3rem;font-weight:700;color:var(--navy);margin-bottom:.3rem;}
.form-header p{font-size:.88rem;color:var(--muted);}
/* TABS */
.tabs{display:flex;background:var(--light);border-radius:10px;padding:.3rem;margin-bottom:1.3rem;gap:.2rem;}
.tab{flex:1;padding:.5rem;border:none;background:transparent;border-radius:8px;font-family:'Sora',sans-serif;font-weight:600;font-size:.84rem;color:var(--muted);cursor:pointer;transition:all .2s;}
.tab.act{background:white;color:var(--navy);box-shadow:0 2px 8px rgba(0,0,0,.08);}
/* ALERT */
.alert{display:none;align-items:center;gap:.6rem;padding:.7rem 1rem;border-radius:10px;font-size:.84rem;margin-bottom:1rem;}
.alert.show{display:flex;}
.alert.err-a{background:#FEE2E2;color:#991B1B;border:1px solid #FECACA;}
.alert.ok-a{background:#D1FAE5;color:#065F46;border:1px solid #A7F3D0;}
/* ROLE SELECTOR */
.role-grid{display:grid;grid-template-columns:1fr 1fr;gap:.6rem;}
.role-card{display:flex;align-items:center;gap:.7rem;padding:.75rem .9rem;border:2px solid var(--border);border-radius:12px;cursor:pointer;transition:all .2s;background:var(--light);}
.role-card:hover{border-color:var(--teal);}
.role-card.sel{border-color:var(--teal);background:#E8F5F2;}
.role-icon{width:36px;height:36px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;}
.role-name{font-family:'Sora',sans-serif;font-weight:600;font-size:.83rem;color:var(--navy);}
.role-desc{font-size:.73rem;color:var(--muted);margin-top:.1rem;}
/* FORM FIELDS */
.field{margin-bottom:1rem;}
.field label{display:block;font-size:.8rem;font-weight:600;color:var(--navy);margin-bottom:.38rem;}
.field-wrap{position:relative;display:flex;align-items:center;}
.field-icon{position:absolute;left:.85rem;color:var(--muted);pointer-events:none;flex-shrink:0;}
.field-wrap input,.field-wrap select{width:100%;border:1.5px solid var(--border);border-radius:10px;padding:.65rem .85rem .65rem 2.6rem;font-family:'DM Sans',sans-serif;font-size:.88rem;color:var(--text);outline:none;transition:border-color .2s,box-shadow .2s;background:white;}
.field-wrap input:focus,.field-wrap select:focus{border-color:var(--teal);box-shadow:0 0 0 3px rgba(20,143,119,.08);}
.field-wrap input.err-field{border-color:var(--err);}
.field-wrap input.ok-field{border-color:var(--ok);}
.field-wrap input::placeholder{color:#aabccc;}
.field-msg{font-size:.75rem;margin-top:.3rem;min-height:1rem;}
.field-msg.err{color:var(--err);}
.field-msg.ok{color:var(--ok);}
.eye-btn{position:absolute;right:.75rem;background:none;border:none;cursor:pointer;color:var(--muted);display:flex;align-items:center;padding:0;transition:color .2s;}
.eye-btn:hover{color:var(--navy);}
/* PASSWORD STRENGTH */
.strength-bar{display:flex;gap:.3rem;margin-top:.45rem;}
.sb{flex:1;height:4px;background:var(--border);border-radius:3px;transition:background .3s;}
.sb.weak{background:var(--err);}
.sb.med{background:var(--warn);}
.sb.strong{background:var(--ok);}
.strength-txt{font-size:.75rem;margin-top:.3rem;font-weight:600;}
/* CHECKBOX */
.check-row{display:flex;align-items:center;gap:.5rem;margin-bottom:.8rem;}
.check-row input[type="checkbox"]{accent-color:var(--teal);width:15px;height:15px;cursor:pointer;flex-shrink:0;}
.check-row label{font-size:.83rem;color:var(--muted);cursor:pointer;}
.forgot a{font-size:.82rem;color:var(--teal);text-decoration:none;font-weight:500;}
.forgot a:hover{text-decoration:underline;}
/* SUBMIT BUTTON */
.sub-btn{width:100%;padding:.75rem;background:linear-gradient(135deg,var(--teal),#1abc9c);color:white;border:none;border-radius:12px;font-family:'Sora',sans-serif;font-weight:700;font-size:.95rem;cursor:pointer;transition:all .2s;display:flex;align-items:center;justify-content:center;gap:.5rem;}
.sub-btn:hover{background:linear-gradient(135deg,var(--td),#16a085);transform:translateY(-1px);box-shadow:0 6px 20px rgba(20,143,119,.3);}
.sub-btn:disabled{opacity:.7;cursor:not-allowed;transform:none;}
.sub-btn .spinner{width:18px;height:18px;border:2px solid rgba(255,255,255,.4);border-top-color:white;border-radius:50%;animation:spin .7s linear infinite;display:none;}
.sub-btn.loading .spinner{display:block;}
.sub-btn.loading .btn-txt{display:none;}
@keyframes spin{to{transform:rotate(360deg);}}
/* SWITCH LINK */
.switch{text-align:center;font-size:.83rem;color:var(--muted);}
.switch a{color:var(--teal);font-weight:600;cursor:pointer;text-decoration:none;}
.switch a:hover{text-decoration:underline;}
/* FOOTER */
.foot{text-align:center;padding:1rem;font-size:.78rem;color:var(--muted);background:white;border-top:1px solid var(--border);}
/* TOAST */
.toast{position:fixed;bottom:1.5rem;right:1.5rem;background:var(--navy);color:white;padding:.65rem 1.1rem;border-radius:10px;font-size:.83rem;z-index:400;box-shadow:0 8px 24px rgba(0,0,0,.25);transition:opacity .3s,transform .3s;opacity:0;transform:translateY(8px);pointer-events:none;max-width:300px;}
.toast.show{opacity:1;transform:translateY(0);}
.toast.ok{border-left:3px solid #52d9bd;}
.toast.err{border-left:3px solid #e74c3c;}
.toast.inf{border-left:3px solid #3498db;}
/* RTL */
[dir="rtl"] .field-icon{left:auto;right:.85rem;}
[dir="rtl"] .field-wrap input,[dir="rtl"] .field-wrap select{padding-left:.85rem;padding-right:2.6rem;}
[dir="rtl"] .eye-btn{right:auto;left:.75rem;}
[dir="rtl"] .toast{right:auto;left:1.5rem;}
/* RESPONSIVE */
@media(max-width:900px){.wrap{grid-template-columns:1fr;}.panel-left{display:none;}.panel-right{padding:2rem 1.5rem;}}
</style>
</head>
<body>
@yield('content')
<script src="{{ asset('js/helpers.js') }}"></script>
@stack('scripts')
</body>
</html>
