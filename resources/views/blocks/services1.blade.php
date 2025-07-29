<section style="{{ $styles }}" class="{{ $classes }} s-services1">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="services">
      <x-slider name="services-1" :per="count($cards) < 4 ? count($cards) : 4" perMd="3" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 24 ]">
        @foreach($cards as $card)
        <div class="swiper-slide">
          <div class="service">
            <x-image :lg="$card['image']" />
            <div class="service-content">
              <x-title :tag="$card['title']['tag']">{!! $card['title']['value'] !!}</x-title>
              {!! $card['description'] !!}
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