<x-title :tag="$content9['title']['tag']">
    {!! $content9['title']['value'] !!}
</x-title>

@foreach($content9['contents'] as $key => $content)
    <div class="container s-content-{{$content['order']}}">
        <div class="s-content-image">
            @if($content['images'])
                <x-akyos-blocks::aky-slider name="slider--review-{{ $key }}" autoheight="true" gap="0" navigation="arrow" pagination="1" scrollbar="1" per="1" permd="1" persm="1" perxs="1" sliderid="{{$block['id']}}">
                    @foreach($content['images'] as $image)
                        <div class="swiper-slide">
                            <x-image :lg="$image"/>
                        </div>
                    @endforeach
                </x-akyos-blocks::aky-slider>
            @endif
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
