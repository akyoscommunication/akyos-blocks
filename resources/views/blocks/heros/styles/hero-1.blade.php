@foreach($images as $key => $image)
    <div class="s-hero-image">
        <x-image :lg="$image['image']"/>
    </div>
@endforeach
<div class="container s-hero-layout">
    <div class="s-hero-title">
        <x-title :tag="$title['tag']">
            {!! $title['value'] !!}
        </x-title>
    </div>
    @if($content)
        <div class="s-hero__content">
            {!! $content !!}
        </div>
    @endif
    @if($buttons)
        <div class="s-hero-buttons">
            @foreach($buttons as $key => $button)
                <x-button :appearance="$button['button']['color']" :icon="$button['button']['icon']" :iconposition="$button['button']['iconposition']"
                          :href="$button['button']['link']['url']" :borderradius="$button['button']['borderradius']">
                    {{ $button['button']['link']['title'] }}
                </x-button>
            @endforeach
        </div>
    @endif
</div>
