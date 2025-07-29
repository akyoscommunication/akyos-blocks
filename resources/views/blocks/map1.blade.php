<section style="{{ $styles }}" class="{{ $classes }} s-map1">
  <div class="container">
    <div class="map">
      <div data-markers='@json($markers)' id="map"></div>
    </div>
    <div class="map-title">
      <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
      {!! $description !!}
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
  </div>
</section>