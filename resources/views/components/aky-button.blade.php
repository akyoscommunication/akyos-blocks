<a class="btn btn--{{ $appearance }} btn--{{ $iconposition ?? null }} btn--{{ $borderradius ?? null }}" href="{{ $href }}"
	target="{{ $target ?? null }}"
>

	@if(isset($icon) && $icon !== 'none')
		@icon($icon)
	@endif

	<span>{!! $slot !!}</span>
</a>
