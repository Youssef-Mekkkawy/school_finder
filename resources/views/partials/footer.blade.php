<!-- FOOTER -->
<footer>
    <div class="fi">
        <div class="fg">
            <div class="fb">
                <a href="#" class="logo" style="display:inline-flex">
                    <div class="logo-icon">SF</div><span class="logo-txt">School<span>Finder</span></span>
                </a>
                <p id="ft-desc">Egypt's most comprehensive directory of international schools.</p>
            </div>
            <div class="fc">
                <h4 id="ft-s">Schools</h4>
                <a href="#" onclick="typeFilter('British',null);return false;">British Schools</a>
                <a href="#" onclick="typeFilter('American',null);return false;">American Schools</a>
                <a href="#" onclick="typeFilter('German',null);return false;">German Schools</a>
                <a href="#" onclick="typeFilter('French',null);return false;">French Schools</a>
            </div>
            <div class="fc">
                <h4 id="ft-p">Platform</h4>
                <a href="#" id="ft-how">How It Works</a>
                <a href="#" onclick="showCmpModal();return false;" id="ft-cmp">Compare Schools</a>
                <a href="#" id="ft-rev">Write a Review</a>
                <a href="#" id="ft-apt">Book Appointment</a>
            </div>
            <div class="fc">
                <h4 id="ft-a">Account</h4>
                <a href="{{ route('login') }}" id="ft-login">Login</a>
                <a href="#" id="ft-reg">Register</a>
                <a href="#" id="ft-fav">My Favorites</a>
                <a href="#" id="ft-myrev">My Reviews</a>
            </div>
        </div>
        <div class="fbot">
            <span>© {{ date('Y') }} SchoolFinder Egypt. All rights reserved.</span>
            <span>International Schools Database — Phase 1 (Demo)</span>
        </div>
    </div>
</footer>
