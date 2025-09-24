<section style="{{ $styles }}" class="{{ $classes }} {{ $block['className'] ?? '' }} s-services2 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    <div class="c-text">{!! $description !!}</div>
    <div class="services">
      <x-slider :name="'services-2-'.$block['id']" perMd="3" perSm="2" perXs="1" :modules="['navigation','pagination']" :per="isset($cards_per_slide) && $cards_per_slide ? $cards_per_slide : 4"
        :extra="[ 'spaceBetween' => (isset($cards_spacing) && $cards_spacing ? $cards_spacing : 24) ]">
        @foreach($cards as $card)
        <div class="swiper-slide">
          <div class="service">
            <x-image :lg="$card['image']" />
            <div class="service-content">
              <x-title :tag="$card['title']['tag']">{!! $card['title']['value'] !!}</x-title>
              <div class="c-text">
                {!! $card['description'] !!}
              </div>
              @if(isset($card['button']) && $card['button'] && $card['button']['link'])
              <x-button :href="$card['button']['link']['url']" :target="$card['button']['link']['target']"
                :appearance="$card['button']['color']">{!! $card['button']['link']['title'] !!}</x-button>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </x-slider>
      @if(count($cards) > (isset($cards_per_slide) && $cards_per_slide ? (int)$cards_per_slide : 4))
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