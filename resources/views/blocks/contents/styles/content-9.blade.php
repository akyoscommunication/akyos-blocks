<x-title :tag="$content9['title']['tag']">
	{!! $content9['title']['value'] !!}
</x-title>

@foreach($content9['contents'] as $key => $content)
	<div class="container s-content-{{$content['order']}}">
		<div class="s-content-image">
			<x-image :lg="$content['image']"/>
		</div>
		<div class="s-content-{{$content['order']}}-layout">
			<x-title :tag="$content['title']['tag']">
				{!! $content['title']['value'] !!}
			</x-title>

			<div class="">
				{!! $content['content'] !!}
			</div>
		</div>

	</div>
@endforeach
