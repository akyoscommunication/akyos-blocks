<section style="{{ $styles }}" class="{{ $classes }} s-hero2">
  <div class="container">
    <div class="title">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      {!! $description !!}
    </div>
    @if($buttons)
      <div class="buttons">
        @foreach($buttons as $button)
          <x-button :href="$button['button']['link']['url']" :target="$button['button']['link']['target']"
                    :appearance="$button['button']['color']">{!! $button['button']['link']['title'] !!}</x-button>
        @endforeach
      </div>
    @endif
  </div>
  <div class="container">
    <x-image :lg="$image"/>
  </div>
</section>
