@php

    $extra = [
        'spaceBetween' => 20
    ];

    if($position === 'reverse') {
        $extra['initialSlide'] = count($images) -1;
    }

@endphp
<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content4">
    <div class="container {{ $position }}">
        <div class="s-content4-content">
            <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
            {!! $content !!}
            @if($button && $button['link'])
                <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                          :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
            @endif
        </div>
        @if($images)
            <div class="s-content4-image">
                <x-slider
                        name="content4"
                        :per="2"
                        :perMd="2"
                        :perSm="1"
                        :perXs="1"
                        :modules="['navigation','pagination']"
                        :extra="$extra"
                >
                    @foreach($images as $image)
                        <div class="swiper-slide">
                            <x-image :lg="$image"  />
                        </div>
                    @endforeach
                </x-slider>
                <div class="swiper-buttons">
                    <div class="swiper-button-prev">
                        @icon('arrow-slider-prev')
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next">
                        @icon('arrow-slider-next')
                    </div>
                </div>
            </div>
        @endif
  </div>
</section>
