<div class="container s-content">

  <div class="s-content-content">
    <x-title :tag="$content3['title']['tag']">
      {!! $content3['title']['value'] !!}
    </x-title>

    <div class="s-content__text">
      {!! $content3['content'] !!}
    </div>

    @if($content3['button'])
      <div class="s-content__button">
        <x-button :appearance="$content3['button']['color']" :icon="$content3['button']['icon']"
                  :iconposition="$content3['button']['iconposition']"
                  :href="$content3['button']['link']['url']">
          {{ $content3['button']['link']['title'] }}
        </x-button>
      </div>
    @endif
  </div>
  <div class="s-content-slider">
    <x-slider name="slider--content3" navigation="arrow" pagination="1" scrollbar="1" per="2.1" permd="2.1" persm="2.1"
              perxs="1.1"
              slider-id="{{$block['id']}}">
      @foreach($content3['images'] as $key => $image)
        <div class="s-content__image swiper-slide">
          <x-image :lg="$image['image']"/>
        </div>
      @endforeach
    </x-slider>
    <div>
      <div class="swiper-buttons-2">
        <div class="swiper-buttons-2-svg swiper-button-prev-{{$block['id']}}">
          @icon('arrow')
        </div>
        <div class=" s-content-swiper swiper-pagination-{{$block['id']}}"></div>
        <div class="swiper-button-next-{{$block['id']}}">
          @icon('arrow')
        </div>
      </div>
    </div>
  </div>
</div>


