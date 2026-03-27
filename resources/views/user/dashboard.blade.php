<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard — SchoolFinder Egypt</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    @stack('styles')
</head>

<body>

    <!-- NAV -->
    <nav>
        <div class="nav-i">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">SF</div>
                <span class="logo-txt">School<span>Finder</span></span>
            </a>
            <div class="nav-right">
                <form method="POST" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}"
                    style="display:inline">
                    @csrf
                    <button type="submit" class="lang-btn">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                        </svg>
                        {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                    </button>
                </form>
                <button class="notif-btn" onclick="showTab('notifications');refreshUnreadBadge()">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                    <div class="notif-dot" id="notif-nav-dot" style="display:none"></div>
                </button>
                <a href="{{ url('/') }}" class="btn-ghost" id="nav-browse">← Browse Schools</a>
                <a href="{{ route('login') }}" class="btn-ghost" onclick="doLogout();return false;"
                    id="nav-logout">Logout</a>
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
                    <div class="ustat">
                        <div class="ustat-n" id="us-favs">0</div>
                        <div class="ustat-l" id="us-favs-lbl">Favorites</div>
                    </div>
                    <div class="ustat">
                        <div class="ustat-n" id="us-revs">0</div>
                        <div class="ustat-l" id="us-revs-lbl">Reviews</div>
                    </div>
                    <div class="ustat">
                        <div class="ustat-n" id="us-appts">0</div>
                        <div class="ustat-l" id="us-appts-lbl">Appts</div>
                    </div>
                </div>
            </div>

            <!-- Nav -->
            <div class="sb-nav">
                <div class="sb-item act" onclick="showTab('overview',this)" id="si-overview">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    <span id="sl-overview">Overview</span>
                </div>
                <div class="sb-item" onclick="showTab('favorites',this)" id="si-favorites">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                    <span id="sl-favorites">Favorites</span>
                    <span class="sb-badge" id="fav-badge">0</span>
                </div>
                <div class="sb-item" onclick="showTab('reviews',this)" id="si-reviews">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                    <span id="sl-reviews">My Reviews</span>
                </div>
                <div class="sb-item" onclick="showTab('appointments',this)" id="si-appointments">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <span id="sl-appointments">Appointments</span>
                    <span class="sb-badge" id="appt-badge" style="background:var(--warn)">0</span>
                </div>
                <div class="sb-item" onclick="showTab('notifications',this)" id="si-notifications">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                    <span id="sl-notifications">Notifications</span>
                    <span class="sb-badge" id="notif-badge" style="display:none">0</span>
                </div>
                <div class="sb-item" onclick="showTab('profile',this)" id="si-profile">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
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
                        <div class="ov-card" onclick="showTab('favorites',document.getElementById('si-favorites'))"
                            style="cursor:pointer">
                            <div class="ov-icon" style="background:#E8F5F2">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--teal)"
                                    stroke-width="2">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                            </div>
                            <div>
                                <div class="ov-val" id="ov-fav-n">0</div>
                                <div class="ov-lbl" id="ov-fav-l">Saved Schools</div>
                            </div>
                        </div>
                        <div class="ov-card" onclick="showTab('reviews',document.getElementById('si-reviews'))"
                            style="cursor:pointer">
                            <div class="ov-icon" style="background:#FEF3E2">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--warn)"
                                    stroke-width="2">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="ov-val" id="ov-rev-n">0</div>
                                <div class="ov-lbl" id="ov-rev-l">Reviews Written</div>
                            </div>
                        </div>
                        <div class="ov-card"
                            onclick="showTab('appointments',document.getElementById('si-appointments'))"
                            style="cursor:pointer">
                            <div class="ov-icon" style="background:#EBF5FB">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3498db"
                                    stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </div>
                            <div>
                                <div class="ov-val" id="ov-appt-n">0</div>
                                <div class="ov-lbl" id="ov-appt-l">Appointments</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent favorites -->
                <div class="sec-card">
                    <div class="sec-head">
                        <h3 id="ov-recent-title">Recently Saved</h3>
                        <button class="btn-sm btn-outline"
                            onclick="showTab('favorites',document.getElementById('si-favorites'))" id="ov-view-all">View
                            All →</button>
                    </div>
                    <div class="fav-grid" id="recent-favs-grid"></div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="sec-card">
                    <div class="sec-head">
                        <h3 id="ov-appts-title">Upcoming Appointments</h3>
                        <button class="btn-sm btn-outline"
                            onclick="showTab('appointments',document.getElementById('si-appointments'))"
                            id="ov-view-appts">View All →</button>
                    </div>
                    <div id="upcoming-appts"></div>
                </div>
            </div>

            <!-- ══ FAVORITES ══ -->
            <div id="tab-favorites" style="display:none">
                <div class="sec-card">
                    <div class="sec-head">
                        <h3 id="fav-title">My Favorite Schools</h3>
                        <button class="btn-sm btn-teal" onclick="window.location.href='{{ url('/') }}'"
                            id="fav-add-btn">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            <span id="fav-add-txt">Add More Schools</span>
                        </button>
                    </div>
                    <div class="fav-grid" id="favs-grid"></div>
                    <div class="empty" id="favs-empty" style="display:none">
                        <div class="empty-icon">❤️</div>
                        <h4 id="favs-empty-title">No favorites yet</h4>
                        <p style="font-size:.83rem;margin-bottom:.8rem" id="favs-empty-sub">Browse schools and save the
                            ones you like</p>
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
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                            <span id="write-rev-txt">Write a Review</span>
                        </button>
                    </div>
                    <div id="reviews-list"></div>
                    <div class="empty" id="revs-empty" style="display:none">
                        <div class="empty-icon">✍️</div>
                        <h4 id="revs-empty-title">No reviews yet</h4>
                        <p style="font-size:.83rem;margin-bottom:.8rem" id="revs-empty-sub">Share your experience to
                            help other parents</p>
                    </div>
                </div>
            </div>

            <!-- ══ APPOINTMENTS ══ -->
            <div id="tab-appointments" style="display:none">
                <div class="sec-card">
                    <div class="sec-head">
                        <h3 id="appt-page-title">My Appointments</h3>
                        <button class="btn-sm btn-teal" onclick="openBookingModal()" id="book-appt-btn">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            <span id="book-appt-txt">Book New Appointment</span>
                        </button>
                    </div>
                    <div id="appts-list"></div>
                    <div class="empty" id="appts-empty" style="display:none">
                        <div class="empty-icon">📅</div>
                        <h4 id="appts-empty-title">No appointments yet</h4>
                        <p style="font-size:.83rem;margin-bottom:.8rem" id="appts-empty-sub">Book a visit to a school
                            from its profile page</p>
                        <a href="{{ url('/') }}" id="appts-empty-link">Browse Schools →</a>
                    </div>
                </div>
            </div>

            <!-- ══ NOTIFICATIONS ══ -->
            <div id="tab-notifications" style="display:none">
                <div class="sec-card">
                    <div class="sec-head">
                        <h3 id="notif-page-title">Notifications</h3>
                        <button class="btn-sm btn-outline" onclick="markAllRead()" id="mark-all-btn">Mark all as
                            read</button>
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
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17,21 17,13 7,13 7,21" />
                                <polyline points="7,3 7,8 15,8" />
                            </svg>
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
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
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
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div></div>
                            <div class="field">
                                <label id="lbl-new-pass">New Password</label>
                                <div class="pass-wrap">
                                    <input class="fi" type="password" id="new-pass" placeholder="Min. 8 characters">
                                    <button class="eye-btn" type="button" onclick="toggleEye('new-pass',this)">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="field">
                                <label id="lbl-conf-pass">Confirm New Password</label>
                                <div class="pass-wrap">
                                    <input class="fi" type="password" id="conf-pass" placeholder="Repeat new password">
                                    <button class="eye-btn" type="button" onclick="toggleEye('conf-pass',this)">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
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
                    <div
                        style="padding:1.2rem 1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.8rem">
                        <div>
                            <div style="font-weight:600;font-size:.88rem;color:var(--navy)" id="del-acc-title">Delete
                                Account</div>
                            <div style="font-size:.8rem;color:var(--muted);margin-top:.15rem" id="del-acc-sub">
                                Permanently delete your account and all your data</div>
                        </div>
                        <button class="btn-sm btn-red" onclick="confirmDeleteAccount()" id="del-acc-btn">Delete
                            Account</button>
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
                <button class="mclose"
                    onclick="document.getElementById('reviewModal').classList.remove('open')">✕</button>
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
                    <textarea class="fi" id="wr-text" rows="4" placeholder="Share your experience about this school..."
                        style="resize:none"></textarea>
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
                    <label id="bk-msg-lbl">Message <span
                            style="font-weight:400;color:var(--muted)">(optional)</span></label>
                    <textarea id="bk-msg" class="fi" rows="3" placeholder="Any questions or special requests..."
                        style="resize:none"></textarea>
                </div>
                <button class="sub-btn" style="width:100%;margin-top:.2rem" onclick="submitBooking()"
                    id="bk-submit-txt">Send Request</button>
            </div>
        </div>
    </div>

    <div class="toast" id="toast"></div>

    <script>window.APP_LOCALE = '{{ app()->getLocale() }}';</script>
    <script src="{{ asset('js/user.js') }}"></script>

</body>

</html>
