<section style="{{ $styles }}" class="{{ $classes }} s-slider2 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    @if($slides)
    <div class="slider">
      <x-slider name="slider-2" per="3" perMd="2" perSm="1" perXs="1" :modules="['navigation','pagination','coverflow']" :extra="['spaceBetween' => 0]">
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
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next">
          @icon('arrow-slider-next')
        </div>
      </div>
    </div>
    @endif
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>