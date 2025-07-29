<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content7">
  <div class="container {{ $position }}">
    <div class="s-content7-content">
      <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
      {!! $content !!}
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    @if($images)
    <div class="s-content7-image">
      @foreach($images as $image)
      <x-image :lg="$image" />
      @endforeach
    </div>
    @endif
  </div>
</section>