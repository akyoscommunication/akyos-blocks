<div class="container s-content-container">

  <div class="container">

    <div class="s-content__title">
      <x-title :tag="$content5['title']['tag']">
        {!! $content5['title']['value'] !!}
      </x-title>
    </div>

    <div class="s-content-layout">
      @foreach($content5['contents'] as $key => $content)
        <div class="s-content-layout-column">
          <x-title :tag="$content['title']['tag']">
            {!! $content['title']['value'] !!}
          </x-title>
          {!! $content['text'] !!}
        </div>
      @endforeach
    </div>

  </div>
</div>
