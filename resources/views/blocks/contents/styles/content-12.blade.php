<div class="container s-content">
    @if($content12['title'] && $content12['title']['value'])
        <x-title :tag="$content12['title']['tag']">
            {!! $content12['title']['value'] !!}
        </x-title>
    @endif
    <ul class="s-content-tab-filters" data-filters="#ContentFiltered{{ $block['id'] }}">
        @foreach($content12['tabs'] as $key => $tab)
            <li class="c-filter" data-filter="tab-{{ $key }}">{!! $tab['title'] !!}</li>
        @endforeach
    </ul>
    <div id="ContentFiltered{{ $block['id'] }}" class="s-content-layout">
        @foreach($content12['tabs'] as $key => $tab)
            <div class="s-content-layout__text" data-filtered="tab-{{ $key }}">
                {!! $tab['content'] !!}
            </div>
            <div class="s-content-layout-column" data-filtered="tab-{{ $key }}">
                @foreach($tab['content-tab'] as $key2 =>  $tab_inner)
                    <div class="s-content-layout-inner" data-filtered="tab-{{ $key }}">
                        @if($tab_inner['title'] && $tab_inner['title']['value'])
                            <x-title :tag="$tab_inner['title']['tag']">
                                {!! $tab_inner['title']['value'] !!}
                            </x-title>
                        @endif
                        <div class="s-content-slider">
                            <x-akyos-blocks::aky-slider name="slider--content12{{$block['id'] . $key2 . $key}}"
                                                        navigation="arrow"
                                                        pagination="1" scrollbar="1" per="1" permd="1"
                                                        persm="1"
                                                        perxs="1"
                                                        autoheight="true" gap="0"
                                                        sliderid="{{$block['id'] . $key2 . $key}}"
                                                        class="s-content-layout-inner__img">
                                @if($tab_inner['images'])
                                    @foreach($tab_inner['images'] as $key3 => $image)
                                        <div class="s-content__image swiper-slide" data-filtered="tab-{{ $key }}">
                                            <x-image :lg="$image['image']"/>
                                        </div>
                                    @endforeach
                                @endif
                            </x-akyos-blocks::aky-slider>
                        </div>
                        <div class="s-content-layout-inner__text">
                            {!! $tab_inner['description'] !!}

                            @if($tab_inner['button'] && $tab_inner['button']['link'])
                                <x-akyos-blocks::aky-button :appearance="$tab_inner['button']['color']"
                                                            :icon="$tab_inner['button']['icon']"
                                                            :iconposition="$tab_inner['button']['iconposition']"
                                                            :href="$tab_inner['button']['link']['url']">
                                    {{ $tab_inner['button']['link']['title'] }}
                                </x-akyos-blocks::aky-button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="s-content-description">
        {!! $content12['description'] !!}
    </div>
</div>


