<div class="container s-content">
    @if($content15['title']['value'])
    <x-title :tag="$content15['title']['tag']">
        {!! $content15['title']['value'] !!}
    </x-title>
    @endif
    @if($content15['content'])
    <div class="s-content__text">
        {!! $content15['content'] !!}
    </div>
        @endif
</div>


