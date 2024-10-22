<div class="container s-content-{{$order}}-container">

  <div class="s-content-{{$order}}-header">
    <div class="s-content-{{$order}}-header__info">
      {!! $info !!}
    </div>

    <x-title :tag="$title['tag']">
      {!! $title['value'] !!}
    </x-title>
  </div>
    <div class="s-content-{{$order}}__text">
      {!! $content !!}
    </div>

    @if($button)
      <div class="s-content-{{$order}}__button">
        <x-button :appearance="$button['color']"
                  :href="$button['link']['url']">
          {{ $button['link']['title'] }}
        </x-button>
      </div>
    @endif


</div>
