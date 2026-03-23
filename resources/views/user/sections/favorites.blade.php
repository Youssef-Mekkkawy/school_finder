    <!-- ══ FAVORITES ══ -->
    <div id="tab-favorites" style="display:none">
      <div class="sec-card">
        <div class="sec-head">
          <h3 id="fav-title">My Favorite Schools</h3>
          <button class="btn-sm btn-teal" onclick="window.location.href='/'" id="fav-add-btn">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            <span id="fav-add-txt">Add More Schools</span>
          </button>
        </div>
        <div class="fav-grid" id="favs-grid"></div>
        <div class="empty" id="favs-empty" style="display:none">
          <div class="empty-icon">❤️</div>
          <h4 id="favs-empty-title">No favorites yet</h4>
          <p style="font-size:.83rem;margin-bottom:.8rem" id="favs-empty-sub">Browse schools and save the ones you like</p>
          <a href="/" id="favs-empty-link">Browse Schools →</a>
        </div>
      </div>
    </div>
