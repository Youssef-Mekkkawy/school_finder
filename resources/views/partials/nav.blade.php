<!-- NAV -->
<nav>
    <div class="nav-i">
        <a href="#" class="logo">
            <div class="logo-icon">SF</div>
            <span class="logo-txt">School<span>Finder</span></span>
        </a>
        <div class="nav-links">
            <a href="#schools" id="nl-browse">{{ __('messages.nav.browse') }}</a>
            <a href="#" onclick="showCmpModal();return false;" id="nl-compare">{{ __('messages.nav.compare') }}</a>
            <a href="#" id="nl-about">{{ __('messages.nav.about') }}</a>
        </div>
        <div class="nav-act">
            <form method="POST" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" style="display:inline" onsubmit="localStorage.setItem('sf_locale','{{ app()->getLocale() === 'en' ? 'ar' : 'en' }}')">
                @csrf
                <button type="submit" class="lang-btn">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                    </svg>
                    {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                </button>
            </form>
            <a href="{{ route('login') }}" class="btn-ghost" id="nl-login">{{ __('messages.nav.login') }}</a>
            {{-- <a href="{{ route('register') }}" class="btn-teal" id="nl-reg">{{ __('messages.nav.register') }}</a> --}}

            <!-- USER MENU (shown when logged in via JS) -->
            <div class="user-menu" id="user-menu" style="display:none">
                <button class="avatar-btn" id="avatar-btn" onclick="toggleUserMenu(event)" aria-expanded="false">
                    <div class="avatar-circle" id="avatar-initials"></div>
                    <svg class="ud-caret" width="10" height="10" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div class="user-dropdown" id="user-dropdown">
                    <div class="ud-header">
                        <div class="ud-name" id="ud-name"></div>
                        <div class="ud-email" id="ud-email"></div>
                    </div>
                    <div class="ud-divider"></div>
                    <a class="ud-item" id="ud-dashboard" href="/dashboard">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        {{ __('messages.dashboard.overview') }}
                    </a>
                    <a class="ud-item" id="ud-settings" href="/dashboard">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
                        </svg>
                        {{ __('messages.dashboard.settings') }}
                    </a>
                    <div class="ud-divider"></div>
                    <button class="ud-item ud-logout" onclick="doLogoutNav()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        {{ __('messages.dashboard.logout') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
