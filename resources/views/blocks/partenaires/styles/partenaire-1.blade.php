<div class="container s-partenaire">
    <x-title :tag="$partenaire1['title']['tag']">
        {!! $partenaire1['title']['value'] !!}
    </x-title>
    <div class="s-partenaire__text">
        {!! $partenaire1['text'] !!}
    </div>
    <div class="s-partenaire-list">
        @foreach($partenaire1['partenaires'] as $partenaire)
            <div class="s-partenaire-list__item">
                <x-image :lg="$partenaire['logo']"/>
            </div>
        @endforeach
    </div>
    @if($partenaire1['button'] && $partenaire1['button']['link']['url'])
        <div class="s-partenaire__btn">
            <x-akyos-blocks::button :appearance="$partenaire1['button']['color']" :icon="$partenaire1['button']['icon']"
                                    :iconposition="$partenaire1['button']['iconposition']"
                                    :href="$partenaire1['button']['link']['url']"
                                    :borderradius="$partenaire1['button']['borderradius']">
                {{ $partenaire1['button']['link']['title'] }}
            </x-akyos-blocks::button>
        </div>
    @endif
</div>
