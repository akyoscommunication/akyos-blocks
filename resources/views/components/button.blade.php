<a {{ $attributes->merge(['class' => 'btn'.($appearance ? " btn--$appearance" : null).($iconposition ? " btn--$iconposition" : null).($borderradius ? " btn--$borderradius" : null)]) }}>

    @if($icon !== '')
      @icon($icon)
    @endif

  <span>{!! $slot !!}</span>
</a>
