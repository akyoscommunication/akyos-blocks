<section style="{{ $styles }}" class="{{ $classes }} s-services4">
  <div class="container">
    <div class="services-title">
      <div>
        <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
        {!! $description !!}
      </div>
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    <div class="services">
      @foreach($cards as $card)
      <div class="service">
        <x-image :lg="$card['image']" />
        <div class="service-content">
          <x-title :tag="$card['title']['tag']">{!! $card['title']['value'] !!}</x-title>
          {!! $card['description'] !!}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>