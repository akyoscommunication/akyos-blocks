<div style="background-image: url({{$content8['image']}});background-position: center;">
    <div class="container s-content-{{$content8['order']}}-container">
        <div class="s-content-layout">
            <x-title :tag="$content8['title']['tag']">
                {!! $content8['title']['value'] !!}
            </x-title>

            <div class="">
                {!! $content8['content'] !!}
            </div>

            @if($content8['button'])
                <div class="">
                    <x-akyos-blocks::aky-button :appearance="$content8['button']['color']"
                                                :icon="$content8['button']['icon']"
                                                :iconposition="$content8['button']['iconposition']"
                                                :href="$content8['button']['link']['url']">
                        {{ $content8['button']['link']['title'] }}
                    </x-akyos-blocks::aky-button>
                </div>
            @endif
        </div>
    </div>
</div>
