<div class="container s-content-{{$content4['order']}}-container">

    <div class="s-content-{{$content4['order']}}-header">
        <div class="s-content-{{$content4['order']}}-header__info">
            {!! $content4['info'] !!}
        </div>

        <x-title :tag="$content4['title']['tag']">
            {!! $content4['title']['value'] !!}
        </x-title>
    </div>
    <div class="s-content-{{$content4['order']}}__text">
        {!! $content4['content'] !!}
    </div>

    @if($content4['button'])
        <div class="s-content-{{$content4['order']}}__button">
            <x-akyos-blocks::aky-button :appearance="$content4['button']['color']" :icon="$content4['button']['icon']"
                                        :iconposition="$content4['button']['iconposition']"
                                        :href="$content4['button']['link']['url']">
                {{ $content4['button']['link']['title'] }}
            </x-akyos-blocks::aky-button>
        </div>
    @endif


</div>
