<div
    {{ $attributes->merge(['class' => 'swiper '.$name.' '.$navigation]) }}
	 autoheight="{{ $autoheight }}"
	 navigation="{{ $navigation }}"
	 pagination="{{ $pagination }}"
	 sliderid="{{ $sliderid }}"
	 per-view-sm="{{ $persm }}"
	 per-view-md="{{ $permd }}"
	 per-view-xs="{{ $perxs }}"
	 per-view="{{ $per }}"
	 data-slider="{{ $name }}"
	 gap="{{ $gap }}" slider>

	<div class="swiper-wrapper">
		{!! $slot !!}
	</div>

	@if($navigation === 'arrow')
		<div class="swiper-buttons">
			<div class="swiper-buttons-prev swiper-button-prev-{{ $sliderid }}">
				@icon('arrow')
			</div>
			@if($pagination === '1')
				<div class="swiper-pagination swiper-pagination-{{ $sliderid }}"></div>
			@endif
			<div class="swiper-buttons-next swiper-button-next-{{ $sliderid }}">
				@icon('arrow')
			</div>
		</div>
	@endif
</div>
