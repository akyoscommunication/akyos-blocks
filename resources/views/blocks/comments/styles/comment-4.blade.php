<div class="container s-comments">
    <x-title
        :position="$title['position']"
        :tag="$title['tag']">
        {!! $title['value'] !!}
    </x-title>
    <div class="s-comments__text">
        {!! $text !!}
    </div>
    <div class="s-comments-layout">
        <x-akyos-blocks::aky-slider name="slider--review" autoheight="true" gap="16" navigation="" pagination="1" scrollbar="1" per="3" permd="1.1" persm="1.1"
                                    perxs="1.1" sliderid="{{$block['id']}}">
            @foreach($comments as $comment)
                <div class="s-comments-layout-inner swiper-slide">
                    <div class="s-comments-layout-inner__image">
                        <x-image class="" :lg="$comment['photo']"></x-image>
                    </div>
                    <div class="s-comments-layout-inner-comment">
                        <div class="s-comments-layout-inner-comment-info">
                            <p class="s-comments-layout-inner-comment-info__name">{!! $comment['name']  !!}</p>
                            <p class="s-comments-layout-inner-comment-info__job">{!! $comment['job']  !!}</p>
                        </div>
                        <div class="s-comments-layout-inner-comment-star">
                            <div>
                                @for($i = 0; $i < $comment['etoiles']; $i++)
                                    @icon('Star')
                                @endfor
                            </div>
                            <div class="s-comments-layout-inner-comment-star__empty">
                                @for($i = 0; $i < (5-$comment['etoiles']); $i++)
                                    @icon('Star')
                                @endfor</div>
                        </div>
                        <div class="s-comments-layout-inner-comment__desc">{!! $comment['description']  !!}</div>
                        <div class="s-comments-layout-inner-comment__date">{!! $comment['date']|date('d/m/Y')  !!}</div>
                    </div>
                </div>
            @endforeach
        </x-akyos-blocks::aky-slider>
        <div class=" s-comments-swiper swiper-pagination-{{$block['id']}}"></div>
        @if($button && $button['link'])
            <div class="s-comments__button">
                <x-akyos-blocks::aky-button :appearance="$button['color']" :icon="$button['icon']" :iconposition="$button['iconposition']"
                                            :href="$button['link']['url']" :borderradius="$button['borderradius']">
                    {{ $button['link']['title'] }}
                </x-akyos-blocks::aky-button>
            </div>
        @endif
    </div>
</div>

