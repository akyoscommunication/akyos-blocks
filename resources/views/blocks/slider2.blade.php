<section style="{{ $styles }}" class="{{ $classes }} s-slider2">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="slider">
      <x-slider name="slider-2" per="3" :modules="['navigation','pagination','coverflow']" :extra="['spaceBetween' => 0]">
        @foreach($slides as $slide)
          <div class="swiper-slide">
            <x-image :lg="$slide['image']"/>
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
    @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>
