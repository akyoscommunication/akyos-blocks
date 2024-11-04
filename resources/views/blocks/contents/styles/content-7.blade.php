<div class="container s-content-container">

  <div class="container">
    <div class="s-content-container">
      <div class="s-content__title">
        <x-title :tag="$content6to7['title']['tag']">
          {!! $content6to7['title']['value'] !!}
        </x-title>
      </div>
      @if($content6to7['button_title'])
        <div class="s-content__button">
          <x-button :appearance="$content6to7['button']['color']" :icon="$content6to7['button']['icon']" :iconposition="$content6to7['button']['iconposition']"
                    :href="$content6to7['button']['link']['url']">
            {{ $content6to7['button']['link']['title'] }}
          </x-button>
        </div>
      @endif
    </div>
    <div class="s-content-layout">
      @foreach($content6to7['contents'] as $key => $content)
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
