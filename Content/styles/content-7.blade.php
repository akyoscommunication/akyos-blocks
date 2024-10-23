<div class="container s-content-container">

  <div class="container">
    <div class="s-content-container">
      <div class="s-content__title">
        <x-title :tag="$content7['title']['tag']">
          {!! $content7['title']['value'] !!}
        </x-title>
      </div>
      @if($content6['button_title'])
        <div class="s-content__button">
          <x-button :appearance="$content6['button_title']['color']"
                    :href="$content6['button_title']['link']['url']">
            {{ $content6['button_title']['link']['title'] }}
          </x-button>
        </div>
      @endif
    </div>
    <div class="s-content-layout">
      @foreach($content7['contents'] as $key => $content)
        <div class="s-content-layout-column">
          <x-title :tag="$content['title']['tag']">
            {!! $content['title']['value'] !!}
          </x-title>

          <div class="s-content__content">
            {!! $content['content'] !!}
          </div>
        </div>
      @endforeach
    </div>


  </div>
</div>
