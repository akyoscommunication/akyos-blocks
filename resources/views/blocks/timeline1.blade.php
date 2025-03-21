<section style="{{ $styles }}" class="{{ $classes }} s-timeline1">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    <div class="s-timeline1__description">
      {!! $description !!}
    </div>
  </div>

  <div class="s-timeline1-pin" timeline-vertical>
    <div class="container">
      <div class="s-timeline1__line" timeline-line></div>
      <div class="s-timeline1-pin-wrapper" timeline-pin-wrapper>
        @foreach($steps as $step)
          <div class="c-timeline1" timeline-item>
            <div class="c-timeline1__number">
              {{ $step['number'] }}
            </div>

            <div class="c-timeline1-infos">
              <div class="c-timeline1-infos__title">
                {{ $step['title'] }}
              </div>
              <div class="c-timeline1-infos__content">
                {!! $step['description'] !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


  @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
              :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
  @endif
</section>
