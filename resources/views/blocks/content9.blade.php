<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content9">
  <div class="container {{ $position }}">
    <div class="s-content9-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      {!! $content !!}
      @if($button && $button['link'])
        <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                  :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    @if($images)
      <div class="s-content9-image">
        @foreach($images as $image)
          <x-image :lg="$image" animation-wipe animation-stagger/>
        @endforeach
      </div>
    @endif
  </div>
</section>
