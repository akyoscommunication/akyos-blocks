<a class="btn btn--{{ $appearance }} btn--{{ $iconposition ?? null }} btn--{{ $borderradius ?? null }}" href="{{ $href }}">

	@if(isset($icon) && $icon !== 'none')
		@icon($icon)
	@endif

	<span>{!! $slot !!}</span>
</a>
