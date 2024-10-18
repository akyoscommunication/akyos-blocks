<section style="{{ $styles }}" class="{{ $classes }} s-content s-content--style-{{$style}}">
{{--  @dump($style)--}}

  @include('blocks.contents.styles.content-' . $style)

</section>
