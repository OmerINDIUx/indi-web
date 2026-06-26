@php
    $variant = $variant ?? '';
    $images = $imageSet['images'] ?? [];
    $folder = $imageSet['folder'] ?? '';
@endphp

<div class="social-carousel {{ $variant ? 'social-carousel--' . $variant : '' }}" data-social-carousel>
    <div class="social-carousel-track">
        @foreach ($images as $index => $image)
            <img
                src="{{ asset($folder . '/' . $image) }}"
                alt="{{ $alt }} {{ $index + 1 }}"
                class="social-carousel-slide {{ $index === 0 ? 'is-active' : '' }}"
                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
            >
        @endforeach
    </div>

    @if (count($images) > 1)
        <div class="social-carousel-dots" aria-hidden="true">
            @foreach ($images as $index => $image)
                <span class="{{ $index === 0 ? 'is-active' : '' }}"></span>
            @endforeach
        </div>
    @endif
</div>
