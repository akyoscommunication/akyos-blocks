<section class="s-sur-footer-3 {{ $classes }}" style="{{ $styles }}">
  <div class="container">
    <div class="s-sur-footer-3__title">{!! $title !!}</div>

    @if($button && $button['link'])
      <x-button href="{{ $button['link']['url'] }}" appearance="{{ $button['color'] }}">{{ $button['link']['title'] }}</x-button>
    @endif
  </div>
</section>
