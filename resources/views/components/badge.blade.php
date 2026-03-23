{{-- resources/views/components/badge.blade.php --}}
@props(['type' => 'default', 'class' => ''])

@php
    $map = [
        'british'   => 'cb-british',
        'american'  => 'cb-american',
        'german'    => 'cb-german',
        'french'    => 'cb-french',
        'approved'  => 'st-approved',
        'pending'   => 'st-pending',
        // add more as needed
    ];
    $classes = $map[$type] ?? '';
@endphp

<span class="badge {{ $classes }} {{ $class }}">{{ $slot }}</span>
