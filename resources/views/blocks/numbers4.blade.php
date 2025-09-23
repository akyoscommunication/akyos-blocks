<section style="{{ $styles }}" class="{{ $classes }} s-numbers4 bg-color-primary color-light @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <div class="numbers-title">
      <div>
        <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
        {!! $description !!}
      </div>
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    <div class="numbers">
      <x-slider name="numbers-4" :per="count($numbers) < 3 ? count($numbers) : 3" perMd="2" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 72]">
        @foreach($numbers as $number)
        <div class="swiper-slide">
          <div class="number">
            <div class="number-row">
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
  </div>
</section>