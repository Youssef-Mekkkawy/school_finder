{{-- resources/views/components/modal.blade.php --}}
@props(['id' => 'modal'])

<div class="ov hidden" id="{{ $id }}" onclick="if(event.target===this) this.classList.remove('open')">
    <div class="modal {{ $attributes->get('class') }}">
        {{ $slot }}
    </div>
</div>
