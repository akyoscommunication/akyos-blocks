@if(count($images) > 1)
    <x-slider name="slider--hero1" navigation="arrow" pagination="1" scrollbar="1" per="1" permd="1" persm="1"
              perxs="1"
              slider-id="slider--hero1">
        @foreach($images as $image)
            <div class="swiper-slide s-hero-image">
                <x-image :lg="$image"/>
            </div>
        @endforeach
    </x-slider>
@else
    @foreach($images as $image)
        <div class="s-hero-image">
            <x-image :lg="$image['image'] ?? $image"/>
        </div>
    @endforeach
@endif
<div class="container s-hero-layout">
    <div class="s-hero-title">
        <x-title :tag="$title['tag']">
            {!! $title['value'] !!}
        </x-title>
    </div>
    @if($content)
        <div class="s-hero__content">
            {!! $content !!}
        </div>
    @endif
    @if($buttons)
        <div class="s-hero-buttons">
            @foreach($buttons as $key => $button)
                @component('akyos-blocks::components.aky-button', [
        'appearance' => $button['button']['color'],
        'icon' => $button['button']['icon'],
        'iconposition' => $button['button']['iconposition'],
        'href' => $button['button']['link']['url'],
        'borderradius' => $button['button']['borderradius'],
        ])
                    {{ $button['button']['link']['title'] }}
                @endcomponent
            @endforeach
        </div>
    @endif
</div>
