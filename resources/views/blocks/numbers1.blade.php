<section style="{{ $styles }}" class="{{ $classes }} s-numbers1 bg-color-primary color-light">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="numbers">
      <x-slider name="numbers-1" :per="count($numbers) < 4 ? count($numbers) : 4" perMd="3" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 0 ]">
        @foreach($numbers as $number)
        <div class="swiper-slide">
          <div class="number">
            <x-image :lg="$number['icon']" />
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