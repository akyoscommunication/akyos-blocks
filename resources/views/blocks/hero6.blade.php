<section style="{{ $styles }}" class="{{ $classes }} s-hero6">
  <div class="container">
    <div class="hero-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
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
    <div class="hero-image">
      <x-image :lg="$image"/>
    </div>
  </div>
</section>
