<section style="{{ $styles }}" class="{{ $classes }} s-pricing3">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="prices">
      <div class="prices-aside">
        @foreach($list as $item)
        <p>{{ $item['item'] }}</p>
        @endforeach
      </div>
      <x-slider name="pricing-3" per="3" perMd="2" perSm="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 30 ]">
        @foreach($prices as $price)
        <div class="swiper-slide">
          <div class="price" @if($price['popular']) style="border: none; background-color: #eee" @endif>
            <div class="price__top">
              @if($price['popular'])
              <span>LE PLUS POPULAIRE</span>
              @endif
              <h3>{!! $price['title'] !!}</h3>
              <div class="price-content__value">
                <p><b>{!! $price['price'] !!}€</b><span>/{!! $price['period'] !!}</span></p>
              </div>
            </div>
            <div class="price-content">
              <div class="price-content-items">
                @foreach($price['functionalities'] as $func)
                <div>
                  @icon('check')
                </div>
                @endforeach
              </div>
              @if($price['button'] && $price['button']['link'])
              <x-button :href="$price['button']['link']['url']" :target="$price['button']['link']['target']"
                :appearance="$price['button']['color']">{!! $price['button']['link']['title'] !!}</x-button>
              @endif
            </div>
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