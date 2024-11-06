<div class="container s-content">
    <x-title :tag="$content14['title']['tag']">
        {!! $content14['title']['value'] !!}
    </x-title>
    <div class="s-content__text">
        {!! $content14['content'] !!}
    </div>
    <div class="s-content-layout">
        @foreach($content14['list'] as $key => $content)
            <div class="s-content-layout-inner">
                <x-image :lg="$content['image']"/>
                <div class="s-content-layout-inner__text">
                    {!! $content['content'] !!}
                </div>
            </div>
        @endforeach
    </div>
</div>


