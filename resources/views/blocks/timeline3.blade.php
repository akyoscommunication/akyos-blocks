<section style="{{ $styles }}" class="{{ $classes }} s-timeline3 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  @if(!empty($title['value']) || !empty($description))
    <div class="container">
      {!! \Akyos\Core\Helpers\print_component('title', $title, 'title') !!}
      @if(!empty($description))
        <div class="s-timeline3__description">
          {!! $description !!}
        </div>
      @endif
    </div>
  @endif
  <div class="s-timeline3-pin" timeline-pin timeline-pin-alternate>
    <div class="container">
      <div class="s-timeline3__line" timeline-line></div>
      <div class="s-timeline3-pin-wrapper" timeline-pin-wrapper>
        @foreach($steps as $step)
        <div class="c-timeline3" timeline-item>
          <div class="c-timeline3__number">
            {{ $step['number'] }}
          </div>
          <div class="c-timeline3__title">
            {{ $step['title'] }}
          </div>
          <div class="c-timeline3__content">
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