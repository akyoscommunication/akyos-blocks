<section style="{{ $styles }}" class="{{ $classes }} s-team6">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="members">
      <x-slider name="team-6" per="4" perMd="3" perSm="2" perXs="1" :modules="['navigation','pagination']"
                :extra="[ 'spaceBetween' => 24 ]">
        @foreach($members as $member)
          <div class="swiper-slide">
            <div class="member">
              <x-image :lg="$member['photo']"/>
              <div class="member-content">
                <p class="member-content__name">{!! $member['name'] !!}</p>
                <p class="member-content__job">{!! $member['job'] !!}</p>
                <div class="member-content-links">
                  <div class="member-content-links__contact">
                    @if($member['phone'])
                      <a href="tel:{{ $member['phone'] }}">
                        @icon('phone')
                      </a>
                    @endif
                    @if($member['email'])
                      <a href="mailto:{{ $member['email'] }}">
                        @icon('email')
                      </a>
                    @endif
                  </div>
                  <div class="member-content-links__socials">
                    @foreach($member['socials'] as $social)
                      <a href="{{ $social['link'] }}" target="_blank">
                        @icon($social['network'])
                      </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </x-slider>
      <div class="members-bottom">
        <div class="swiper-buttons">
          <div class="swiper-button-prev">
            @icon('arrow-slider-prev')
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next">
            @icon('arrow-slider-next')
          </div>
        </div>
        @if($button && $button['link'])
          <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                    :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
        @endif
      </div>
    </div>
  </div>
</section>
