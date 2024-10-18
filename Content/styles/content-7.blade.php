<div class="container s-content-container">

  <div class="container">
    <div class="s-content-container">
      <div class="s-content__title">
        <x-title :tag="$title['tag']">
          {!! $title['value'] !!}
        </x-title>
      </div>
      @if($button_title)
        <div class="s-content__button">
          <x-button :appearance="$button_title['color']"
                    :href="$button_title['link']['url']">
            {{ $button_title['link']['title'] }}
          </x-button>
        </div>
      @endif
    </div>
    <div class="s-content-layout">
      @foreach($contents as $key => $content)
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
