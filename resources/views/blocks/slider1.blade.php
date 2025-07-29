<section style="{{ $styles }}" class="{{ $classes }} s-slider1">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    @if($slides)
    <div class="slider">
      <x-slider name="slider-1" per="3" perMd="2" perSm="1" perXs="1" :modules="['navigation','pagination']" :extra="['spaceBetween' => 20]">
        @foreach($slides as $slide)
        <div class="swiper-slide">
          <x-image :lg="$slide['image']" />
        </div>
        @endforeach
      </x-slider>

      <div class="swiper-buttons">
        <div class="swiper-button-prev">
          @icon('arrow-slider-prev')
        </div>
        <div class="swiper-button-next">
          @icon('arrow-slider-next')
        </div>
      </div>

      <div class="swiper-pagination"></div>

    </div>
    @endif
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>