<!-- NAV -->
<nav>
    <div class="nav-i">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">SF</div>
            <span class="logo-txt">School<span>Finder</span></span>
        </a>
        <div style="display:flex;align-items:center;gap:.8rem">
            <form method="POST" action="{{ route('lang.switch', app()->getLocale() === 'en' ? 'ar' : 'en') }}" style="display:inline">
                @csrf
                <button type="submit" class="lang-btn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                    </svg>
                    {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                </button>
            </form>
            <a href="{{ route('home') }}"
                style="color:#a8c4d8;font-size:.85rem;text-decoration:none;font-weight:500;transition:color .2s"
                id="nav-back">← Back to Schools</a>
        </div>
    </div>
</nav>
