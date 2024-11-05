<a class="btn btn--{{ $appearance }} btn--{{ $iconposition ?? null }} btn--{{ $borderradius ?? null }}">

	@if(isset($icon) && $icon !== 'none')
		@icon($icon)
	@endif

	<span>{!! $slot !!}</span>
</a>
