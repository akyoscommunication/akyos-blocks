<section style="{{ $styles }}" class="{{ $classes }} s-testimonials1">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="testimonials">
      <x-slider name="testimonials-1" per="3" perMd="2" perSm="1" :modules="['pagination','navigation']"
                :extra="['spaceBetween' => 20]">
        @foreach($testimonials as $testimonial)
          <div class="swiper-slide">
            <div class="testimonial">
              <div class="testimonial-author">
                <x-image :lg="$testimonial['photo']"/>
                <div class="testimonial-author__details">
                  <p>{!! $testimonial['name'] !!}</p>
                  @if($testimonial['job'])
                    <b><small>{!! $testimonial['job'] !!}</small></b>
                  @endif
                  @if($testimonial['date'])
                    <small>{!! $testimonial['date'] !!}</small>
                  @endif
                  <div class="testimonial-author__rating">
                    @for($i = 0; $i < 5; $i++)
                      @if($i < $testimonial['rating'])
                        @icon('star')
                      @endif
                    @endfor
                  </div>
                </div>
              </div>
              <div class="testimonial-content">
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
