<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content8">
  <div class="container {{ $position }}">
    <div class="s-content8-content">
      {!! \Akyos\Core\Helpers\print_component('title', $title, 'title') !!}
      <div class="c-text">
        {!! $content !!}
      </div>
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    @if($images)
    <div class="s-content8-image">
      @foreach($images as $image)
      <x-image :lg="$image" />
      @endforeach
    </div>
    @endif
  </div>
</section>