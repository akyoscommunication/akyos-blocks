<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content10">
  <div class="container {{ $position }}">
    <div class="s-content10-content">
      @if(count($images) > 1)
        <x-image :lg="end($images)"/>
      @endif
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      {!! $content !!}
      @if($button && $button['link'])
        <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                  :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    @if($images)
      <div class="s-content10-image">
        <x-image :lg="array_shift($images)" animation-wipe animation-stagger/>
      </div>
    @endif
  </div>
</section>
