<section style="{{ $styles }}" class="{{ $classes }} s-accordion2">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="accordions">
      @foreach($accordions as $key => $accordion)
      <details class="c-accordion" accordion>
        <summary>
          <h3 class="c-accordion-trigger">{!! $accordion['title'] !!}
            @icon('chevron')
          </h3>
        </summary>
        <section class="c-accordion-2-content-{{ $key }} c-accordion-content">
          <div class="c-accordion-content__text">
            {!! $accordion['content'] !!}
            @if($accordion['button'] && $accordion['button']['link'])
            <x-button :href="$accordion['button']['link']['url']" :target="$accordion['button']['link']['target']"
              :appearance="$accordion['button']['color']">{!! $accordion['button']['link']['title'] !!}</x-button>
            @endif
          </div>
          @if($accordion['images'])
          <div class="c-accordion-content__images">
            <x-slider name="accordion-{{ $key }}" per="1" perMd="1" perSm="1" :modules="['navigation','pagination']"
              :extra="[ 'spaceBetween' => 20 ]">
              @foreach($accordion['images'] as $image)
              <div class="swiper-slide">
                <x-image :lg="$image" />
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
        </section>
      </details>
      @endforeach
    </div>
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>