<section style="{{ $styles }}" class="{{ $classes }} s-hero4">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    <div class="hero-content">
      {!! $description !!}
      @if($buttons)
        <div class="buttons">
          @foreach($buttons as $button)
            <x-button :href="$button['button']['link']['url']" :target="$button['button']['link']['target']"
                      :appearance="$button['button']['color']">{!! $button['button']['link']['title'] !!}</x-button>
          @endforeach
        </div>
      @endif
    </div>
  </div>
  <div class="container">
    <x-image :lg="$image"/>
  </div>
</section>
