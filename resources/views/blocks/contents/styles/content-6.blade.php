<div class="container s-content-container">

  <div class="container">

    <div class="s-content__title">
      <x-title :tag="$content6to7['title']['tag']">
        {!! $content6to7['title']['value'] !!}
      </x-title>
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

          @if($content['button']['link'])
            <div class="s-content__button">
              <x-button :appearance="$content['button']['color']" :icon="$content['button']['icon']" :iconposition="$content['button']['iconposition']"
                        :href="$content['button']['link']['url']">
                {{ $content['button']['link']['title'] }}
              </x-button>
            </div>
          @endif
        </div>

      @endforeach
    </div>

  </div>
</div>
