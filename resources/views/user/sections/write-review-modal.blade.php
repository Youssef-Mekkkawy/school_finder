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
          <option>The British International School Cairo</option>
          <option>Cairo American College</option>
          <option>Rahn Schulen Kairo</option>
          <option>El Alsson British & American School</option>
          <option>Lycée Français Simone de Beauvoir</option>
        </select>
      </div>
      <div class="field">
        <label id="wr-rating-lbl">Rating</label>
        <div class="star-r" id="wr-stars">
          ${[1,2,3,4,5].map(i=>`<span class="star" onclick="setRevStar(${i})" id="wrs${i}">★</span>`).join('')}
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
