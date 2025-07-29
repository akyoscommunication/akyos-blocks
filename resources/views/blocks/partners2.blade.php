<section style="{{ $styles }}" class="{{ $classes }} s-partners2">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}

    <div class="partners-logos">
      <x-slider name="partners-1" :per="count($partners) < 6 ? count($partners) : 6" perMd="4" perSm="3" perXs="2" :modules="['navigation','pagination']">
        @foreach($partners as $partner)
        <div class="swiper-slide">
          <x-image :lg="$partner['image']" />
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