<section style="{{ $styles }}" class="{{ $classes }} s-timeline4 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    <div class="s-timeline4__description">
      {!! $description !!}
    </div>
  </div>
  <div class="s-timeline4-pin" timeline-pin timeline-pin-middle>
    <div class="container">
      <div class="s-timeline4__line" timeline-line></div>
      <div class="s-timeline4-pin-wrapper" timeline-pin-wrapper>
        @foreach($steps as $step)
        <div class="c-timeline4" timeline-item>
          <div class="c-timeline4__number">
            {{ $step['number'] }}
          </div>
          <div class="c-timeline4__title">
            {{ $step['title'] }}
          </div>
          <div class="c-timeline4__content">
            {!! $step['description'] !!}
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