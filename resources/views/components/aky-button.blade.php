<a class="btn btn--{{ $appearance }} btn--{{ $iconposition }} btn--{{ $borderradius }}">

	@if($icon !== 'none')
		@icon($icon)
	@endif

	<span>{!! $slot !!}</span>
</a>
