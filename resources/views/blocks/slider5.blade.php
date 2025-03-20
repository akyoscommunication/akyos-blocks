<section style="{{ $styles }}" class="{{ $classes }} s-slider5">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="slider">
      <x-slider name="slider-5" per="2" perMd="2" perSm="2" perXs="1" :modules="['navigation','pagination','grid']" :extra="['spaceBetween' => 20]">
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
