{{--<div class="s-content-image">--}}
{{--  <x-image :lg="$image"/>--}}
{{--</div>--}}
<div style="background-image: url({{$image}});background-position: center;">
<div class="container s-content-{{$order}}-container">
  <div class="s-content-layout">
    <x-title :tag="$title['tag']">
      {!! $title['value'] !!}
    </x-title>

    <div class="">
      {!! $content !!}
    </div>

    @if($button)
      <div class="">
        <x-button :appearance="$button['color']"
                  :href="$button['link']['url']">
          {{ $button['link']['title'] }}
        </x-button>
      </div>
    @endif
  </div>
</div>
</div>
