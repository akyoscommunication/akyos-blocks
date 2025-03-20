<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content12">
  <div class="container {{ $position }}">
    <div class="s-content12-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      {!! $content !!}
      @if($button && $button['link'])
        <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                  :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
      @if(count($images) > 1)
        <x-image :lg="end($images)"/>
      @endif
    </div>
    @if($images)
      <div class="s-content12-image">
        <x-image :lg="array_shift($images)"/>
      </div>
    @endif
  </div>
</section>
