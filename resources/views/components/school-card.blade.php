{{-- resources/views/components/school-card.blade.php --}}
@props(['school', 'compact' => false])

<div class="school-card">
    <div class="sc-top flex justify-between items-center">
        <span class="cbadge {{ $school->type->name === 'British' ? 'cb-british' : '' }}
                         {{ $school->type->name === 'American' ? 'cb-american' : '' }}
                         {{ $school->type->name === 'German'   ? 'cb-german'   : '' }}
                         {{ $school->type->name === 'French'   ? 'cb-french'   : '' }}">
            {{ $school->type->name }}
        </span>

        {{--   fav / compare icons are handled by JS – keep the same IDs/ classes   --}}
        <div class="rem-btn" onclick="removeFav({{ $school->id }})" title="{{ __('removeFav') }}">
            <svg width="11" height="11" ...></svg>
        </div>
    </div>

    <div class="sc-body">
        <div class="sc-name">{{ $school->name }}</div>

        <div class="sc-loc flex items-center gap-1 text-[#5D7285] text-sm">
            <svg ...></svg>
            {{ $school->location->area }}, {{ $school->location->city }}
        </div>

        <div class="flex flex-wrap gap-1 mt-2">
            @foreach($school->curricula as $cur)
                <span class="tag">{{ $cur->name }}</span>
            @endforeach
        </div>

        <div class="flex justify-between items-center pt-2 border-t border-[#F0F6FF] mt-2">
            <div>
                <div class="sc-fee">{{ $school->fee_display }}</div>
                <div class="sc-fee-sub text-[#5D7285] text-xs">{{ __('feeLabel') }}</div>
            </div>
            <div class="sc-rating text-[#d4770a] font-semibold">
                ★ {{ $school->rating ?? '—' }}
            </div>
        </div>
    </div>
</div>
