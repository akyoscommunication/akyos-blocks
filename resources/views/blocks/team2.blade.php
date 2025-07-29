<section style="{{ $styles }}" class="{{ $classes }} s-team2">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="members">
      @foreach($members as $member)
      <div class="member">
        <x-image :lg="$member['photo']" />
        <div class="member-content">
          <p class="member-content__name">{!! $member['name'] !!}</p>
          @if($member['job'])
          <p class="member-content__job">{!! $member['job'] !!}</p>
          @endif
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
            @if($member['socials'])
            <div class="member-content-links__socials">
              @foreach($member['socials'] as $social)
              <a href="{{ $social['link'] }}" target="_blank">
                @icon($social['network'])
              </a>
              @endforeach
            </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>