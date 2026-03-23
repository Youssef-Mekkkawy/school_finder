@if(isset($schoolOfMonth) && $schoolOfMonth)
<!-- SCHOOL OF THE MONTH -->
<section style="background:linear-gradient(135deg,#FFFBF0 0%,#FFF8E7 100%);padding:3.5rem 2rem;">
    <div class="si">
        <div style="text-align:center;margin-bottom:1.6rem">
            <span class="sec-tag" style="background:#FEF3C7;color:#92400E;">⭐ Featured School</span>
            <h2 class="sec-title" style="text-align:center" id="som-title">School of the Month</h2>
        </div>
        <div style="max-width:520px;margin:0 auto">
            <div class="card" style="border:2px solid #E67E22;box-shadow:0 8px 32px rgba(230,126,34,.15);">
                <!-- Gold banner -->
                <div style="background:linear-gradient(90deg,#E67E22,#d35400);padding:.5rem 1.2rem;display:flex;align-items:center;gap:.5rem">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="white" stroke="none">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span style="font-family:'Sora',sans-serif;font-weight:700;font-size:.8rem;color:white">
                        {{ $schoolOfMonth->featured_badge_text }}
                    </span>
                </div>
                <!-- Type badge row -->
                <div class="ct">
                    @php
                        $typeMap = [
                            'British'  => 'cb-british',
                            'American' => 'cb-american',
                            'German'   => 'cb-german',
                            'French'   => 'cb-french',
                        ];
                        $typeName  = $schoolOfMonth->type?->name ?? '';
                        $typeClass = $typeMap[$typeName] ?? 'cb-british';
                    @endphp
                    <span class="cbadge {{ $typeClass }}">{{ $typeName }}</span>
                </div>
                <!-- Card body -->
                <div class="cb">
                    <div class="cname">{{ $schoolOfMonth->name }}</div>
                    <div class="cloc">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        {{ $schoolOfMonth->location?->area }}{{ $schoolOfMonth->location?->city ? ', ' . $schoolOfMonth->location->city : '' }}
                    </div>
                    @if($schoolOfMonth->curricula->count())
                    <div class="ctags">
                        @foreach($schoolOfMonth->curricula as $c)
                            <span class="tag">{{ $c->abbreviation }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="cf">
                        @php $fee = $schoolOfMonth->fees->first(); @endphp
                        <div>
                            <div class="cfee">
                                @if($fee)
                                    {{ number_format($fee->tuition_min) }} – {{ number_format($fee->tuition_max) }} {{ $fee->currency ?? 'EGP' }}
                                @else
                                    Contact school
                                @endif
                            </div>
                            <div class="cfeesub">/ year</div>
                        </div>
                        <div class="crat">
                            ★ {{ number_format($schoolOfMonth->rating, 1) }}
                            <span class="crev">({{ $schoolOfMonth->review_count }})</span>
                        </div>
                    </div>
                    <button class="vbtn" style="background:#FEF3C7;color:#92400E;"
                            onclick="openSch({{ $schoolOfMonth->id }})">
                        View School →
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
