<section style="{{ $styles }}" class="{{ $classes }} {{ $block['className'] ?? '' }} s-partners2">
  <div class="container">
    {!! \Akyos\Core\Helpers\print_component('title', $title, 'title') !!}
    @if(!empty($description))
      <div class="c-text">
        {!! $description !!}
      </div>
    @endif

    <div class="partners-logos">
      <x-slider name="partners-1" :per="count($partners) < 6 ? count($partners) : 6" perMd="4" perSm="3" perXs="2" :modules="['navigation','pagination']">
        @foreach($partners as $partner)
        <div class="swiper-slide">
          <x-image :lg="$partner['image']" />
        </div>
        @endforeach
      </x-slider>
    </div>

  </div>
</section>