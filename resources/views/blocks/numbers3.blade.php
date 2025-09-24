<section style="{{ $styles }}" class="{{ $classes }} s-numbers3 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    <div class="c-text">
      {!! $description !!}
    </div>
    <div class="numbers">
      <x-slider name="numbers-3" :per="count($numbers) < (isset($numbers_per_slide) && $numbers_per_slide ? $numbers_per_slide : 3) ? count($numbers) : (isset($numbers_per_slide) && $numbers_per_slide ? $numbers_per_slide : 3)" perMd="2" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => (isset($numbers_spacing) && $numbers_spacing != null ? $numbers_spacing : 20) ]">
        @foreach($numbers as $number)
        <div class="swiper-slide">
          <div class="number">
            @if($number['icon'])
              <x-image :lg="$number['icon']" />
            @endif
            <div class="number__value">
              @if($number['position'])
              <span class="number__symbol">{!! $number['symbol'] !!}</span>
              @endif
              <span animation-number="{{ $number['number'] }}">{!! $number['number'] !!}</span>
              @if(!$number['position'])
              <span class="number__symbol">{!! $number['symbol'] !!}</span>
              @endif
            </div>
            {!! $number['description'] !!}
          </div>
        </div>
        @endforeach
      </x-slider>
      @if((count($numbers) > (isset($numbers_per_slide) && $numbers_per_slide ? $numbers_per_slide : 3)))
        <div class="swiper-buttons">
          <div class="swiper-button-prev">
            @icon('arrow-slider-prev')
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next">
            @icon('arrow-slider-next')
          </div>
        </div>
      @endif
    </div>
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>