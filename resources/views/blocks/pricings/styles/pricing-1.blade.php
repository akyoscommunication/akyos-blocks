<div class="container s-pricing">
    @if($pricing1['title']['value'])
        <x-title :tag="$pricing1['title']['tag']">
            {!! $pricing1['title']['value'] !!}
        </x-title>
    @endif
    @if($pricing1['content'])
        <div class="s-pricing__text">
            {!! $pricing1['content'] !!}
        </div>
    @endif
    <div class="s-pricing-layout">
        @foreach($pricing1['prices'] as $price)
            <div class="s-pricing-layout-inner">
                <div class="s-pricing-layout-inner__color" style="background-color:{{ $price['color']}};"></div>
                <div class="s-pricing-layout-inner-content">
                    @if($price['title'])
                        <div class="s-pricing-layout-inner-content__title">
                            {!! $price['title'] !!}
                        </div>
                    @endif
                    @if($price['description'])
                        <div class="s-pricing-layout-inner-content__text">
                            {!! $price['description'] !!}
                        </div>
                    @endif

                    <div>
                        @if($price['price'])
                            <span class="s-pricing-layout-inner-content__price">{!! $price['price'] !!}</span>
                        @endif @if($price['price_per'])
                            <span class="s-pricing-layout-inner-content__per">/{!! $price['price_per'] !!}</span>
                        @endif

                    </div>
                    <div>
                        @if($price['features'])
                            @foreach($price['features'] as $feature)
                                <div class="s-pricing-layout-inner-content__check">
                                    @icon('check')
                                    <p>{!! $feature['feature'] !!}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @if($price['price_button'] && $price['price_button']['link'])
                        <div class="s-pricing-layout-inner-content__btn">
                            <x-akyos-blocks::button :appearance="$price['price_button']['color']"
                                                    :icon="$price['price_button']['icon']"
                                                    :iconposition="$price['price_button']['iconposition']"
                                                    :href="$price['price_button']['link']['url']"
                                                    :borderradius="$price['price_button']['borderradius']">
                                {{ $price['price_button']['link']['title'] }}
                            </x-akyos-blocks::button>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
