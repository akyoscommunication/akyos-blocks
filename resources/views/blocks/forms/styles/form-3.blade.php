<div class="container s-form">
  @if($form3['title'] && $form3['title']['value'])
		<x-title :tag="$form3['title']['tag']">
			{!! $form3['title']['value'] !!}
		</x-title>
	@endif
	@if($form3['text'])
		<div class="s-form__text">
			{!! $form3['text'] !!}
		</div>
	@endif
	@if($form3['image_or_map'] === 'image')
		<div class="s-form__image">
			<x-image :lg="$form3['image']"/>
		</div>
	@endif
	@if($form3['image_or_map'] === 'map')
		<iframe
				src="{{ $form3['maps'] }}"
				style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
	@endif
	@if($form3['button'] && $form3['button']['link'])
		<x-akyos-blocks::aky-button :appearance="$form3['button']['color']" :icon="$form3['button']['icon']"
											 :iconposition="$form3['button']['iconposition']"
											 :href="$form3['button']['link']['url']" :borderradius="$form3['button']['borderradius']">
			{{ $form3['button']['link']['title'] }}
		</x-akyos-blocks::aky-button>
	@endif
</div>
