<section class="s-sur-footer-2 {{ $classes }}" style="{{ $styles }}">
  <div class="container">
    <h3 class="s-sur-footer-2__title">{!! $title !!}</h3>

    @if($button && $button['link'])
    <x-button href="{{ $button['link']['url'] }}" appearance="{{ $button['color'] }}">{{ $button['link']['title'] }}</x-button>
    @endif
  </div>
</section>