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
