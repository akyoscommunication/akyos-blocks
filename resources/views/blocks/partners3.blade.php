<section style="{{ $styles }}" class="{{ $classes }} s-partners3">
  <div class="container">
    <div class="partners-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      {!! $description !!}
      @if($button && $button['link'])
        <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                  :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    <div class="slider">
      <x-slider name="partners-3" per="2" perMd="2" perSm="2" perXs="2" :modules="['navigation','pagination','grid']" :extra="['rows' => 3]" >
        @foreach($partners as $partner)
          <div class="swiper-slide">
            <x-image :lg="$partner['image']"/>
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
