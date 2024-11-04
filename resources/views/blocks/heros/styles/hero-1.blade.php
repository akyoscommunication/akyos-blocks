@php
    use Akyos\Blocks\View\Components\AkyButton;

      $akyButton = new AkyButton();
@endphp

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

                @php
                    echo $akyButton->render()->with([
              'appearance' => $button['button']['color'],
              'icon' => $button['button']['icon'],
              'iconposition' => $button['button']['iconposition'],
              'href' => $button['button']['link']['url'],
              'borderradius' => $button['button']['borderradius'],
              'slot' => $button['button']['link']['title'],
              ]);
                @endphp
            @endforeach
        </div>
    @endif
</div>
