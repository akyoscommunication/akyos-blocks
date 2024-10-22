<div class="container s-content-container-{{$order}}">
{{--  @dump($order)--}}
    <div class="s-content-layout">

      <div class="s-content-layout__title">
        <x-title :tag="$title['tag']">
          {!! $title['value'] !!}
        </x-title>
      </div>

      <div class="s-content-layout__text">
        {!! $content !!}
      </div>

      @if($button)
        <div class="s-content-layout__button">
          <x-button :appearance="$button['color']"
                    :href="$button['link']['url']">
            {{ $button['link']['title'] }}
          </x-button>
        </div>
      @endif
    </div>

    <div class="s-content-image">
      <x-image :lg="$image"/>
    </div>


</div>
