<section style="{{ $styles }}" class="{{ $classes }} s-timeline5">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    <div class="s-timeline5__description">
      {!! $description !!}
    </div>
  </div>

  <div class="s-timeline5-pin" timeline-vertical>
    <div class="container">
      <div class="s-timeline5__line" timeline-line></div>
      <div class="s-timeline5-pin-wrapper" timeline-pin-wrapper>
        @foreach($steps as $step)
        <div class="c-timeline5" timeline-item>
          <div class="c-timeline5__number">
            {{ $step['number'] }}
          </div>

          <div class="c-timeline5-infos">
            <div class="c-timeline5-infos__title">
              {{ $step['title'] }}
            </div>
            <div class="c-timeline5-infos__content">
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