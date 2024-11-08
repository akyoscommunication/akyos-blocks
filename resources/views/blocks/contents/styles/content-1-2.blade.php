<div class="container s-content-container-{{$content1to2['order']}}">

    <div class="s-content-layout">
        <div class="s-content-layout__title">
            <x-title :tag="$content1to2['title']['tag']">
                {!! $content1to2['title']['value'] !!}
            </x-title>
        </div>

        <div class="s-content-layout__text">
            {!! $content1to2['content'] !!}
        </div>

        @if($content1to2['button'] && $content1to2['button']['link'])
            <div class="s-content-layout__button">
                <x-akyos-blocks::aky-button :appearance="$content1to2['button']['color']" :icon="$content1to2['button']['icon']" :iconposition="$content1to2['button']['iconposition']"
                                            :href="$content1to2['button']['link']['url']">
                    {{ $content1to2['button']['link']['title'] }}
                </x-akyos-blocks::aky-button>
            </div>
        @endif
    </div>

    <div class="s-content-image">
        <x-image :lg="$content1to2['image']"/>
    </div>
</div>
