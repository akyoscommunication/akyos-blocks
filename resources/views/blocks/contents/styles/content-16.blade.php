<div class="container s-content">
  @if($content16['title']['value'])
    <x-title :tag="$content16['title']['tag']">
      {!! $content16['title']['value'] !!}
    </x-title>
  @endif
  @if($content16['content'])
    <div class="s-content__text">
      {!! $content16['content'] !!}
    </div>
  @endif
  <div class="s-content-layout">
    @foreach($content16['list'] as $key => $content)
      <div class="s-content-layout-inner">
        {!! $content['content'] !!}
      </div>
    @endforeach
  </div>
</div>


