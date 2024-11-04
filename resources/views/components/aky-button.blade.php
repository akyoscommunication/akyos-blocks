<a class="btn btn--{{ $appearance }} btn--{{ $iconposition }} btn--{{ $borderradius }}">

    @if($icon !== '')
        @icon($icon)
    @endif

    <span>{!! $slot !!}</span>
</a>
