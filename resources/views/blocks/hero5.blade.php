<section style="{{ $styles }}; --bg: url('{{ $image }}')" class="{{ $classes }} s-hero5">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
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
</section>
