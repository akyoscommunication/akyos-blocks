<div class="container s-number">
	@if($number2['title'] && $number2['title']['value'])
		<div class="s-number__title">
			<x-title :tag="$number2['title']['tag']">
				{!! $number2['title']['value'] !!}
			</x-title>
		</div>
	@endif

	{!! $number2['content'] !!}

	<div class="s-number-layout">
		@foreach($number2['numbers'] as $number)
			<div class="s-number-layout-inner">
				<div class="s-number-layout-inner__icon">
					@if($number['icon'])
						<x-image :lg="$number['icon']"/>
					@endif
				</div>
				<div class="s-number-layout-inner__info">
					<div class="info__title">
						{!! $number['number'] !!}
					</div>
					<div class="info__text">
						{!! $number['description'] !!}
					</div>
				</div>
			</div>
		@endforeach
	</div>

	@if($number2['button'] && $number2['button']['link'])
		<div class="s-number__button">
			<x-akyos-blocks::aky-button
					:appearance="$number2['button']['color']"
					:icon="$number2['button']['icon']"
					:iconposition="$number2['button']['iconposition']"
					:href="$number2['button']['link']['url']"
			>
				{{ $number2['button']['link']['title'] }}
			</x-akyos-blocks::aky-button>
		</div>
	@endif
</div>
