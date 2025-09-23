<section style="{{ $styles }}" class="{{ $classes }} s-testimonials2 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="testimonials">
      <x-slider name="testimonials-2" :per="count($testimonials) < 2 ? count($testimonials) : 2" perMd="1" perSm="1" perXs="1" :modules="['pagination','navigation']"
        :extra="['spaceBetween' => 40]">
        @foreach($testimonials as $testimonial)
        <div class="swiper-slide">
          <div class="testimonial">
            <x-image :lg="$testimonial['photo']" />
            <div class="testimonial-content">
              <div class="testimonial-content__name">
                <div>
                  <p>{!! $testimonial['name'] !!}</p>
                  @if($testimonial['job'])
                  <small>{!! $testimonial['job'] !!}</small>
                  @endif
                </div>
                @if($testimonial['date'])
                <small>{!! $testimonial['date'] !!}</small>
                @endif
              </div>
              <div class="testimonial-content__rating">
                @for($i = 0; $i < 5; $i++)
                  @if($i < $testimonial['rating'])
                  @icon('star')
                  @endif
                  @endfor
                  </div>
                  {!! $testimonial['content'] !!}
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