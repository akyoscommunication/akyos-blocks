<section style="{{ $styles }}" class="{{ $classes }} s-testimonials3 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="testimonials">
      <x-slider name="testimonials-3" :per="count($testimonials) < 4 ? count($testimonials) : 4" perMd="3" perSm="2" perXs="1" :modules="['pagination','navigation']"
        :extra="['spaceBetween' => 20]">
        @foreach($testimonials as $testimonial)
        <div class="swiper-slide">
          <div class="testimonial">
            <x-image :lg="$testimonial['photo']" />
            {!! $testimonial['content'] !!}
            <div class="testimonial__rating">
              @for($i = 0; $i < 5; $i++)
                @if($i < $testimonial['rating'])
                @icon('star')
                @endif
                @endfor
                </div>
                <div class="testimonial__name">
                  <p>{!! $testimonial['name'] !!}</p>
                  @if($testimonial['job'])
                  <b><small>{!! $testimonial['job'] !!}</small></b>
                  @endif
                  @if($testimonial['date'])
                  <small>{!! $testimonial['date'] !!}</small>
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