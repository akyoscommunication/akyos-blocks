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
    <x-slider name="slider--review" navigation="" pagination="1" scrollbar="1" per="4.1" permd="2.1" persm="1.1"
              perxs="1.1" slider-id="{{$block['id']}}">
      @foreach($comments as $key => $comment)
        <div class="s-comments-layout-inner swiper-slide">
          <div class="s-comments-layout-inner__image">
            <x-image class="" :lg="$comment->getPhoto()"></x-image>
          </div>
          <div class="s-comments-layout-inner-comment__desc">{!! $comment->getDescription()  !!}</div>
          <div class="s-comments-layout-inner-comment-star">
            <div>
              @for($i = 0; $i < $comment->getStar(); $i++)
                @icon('Star')
              @endfor
            </div>
            <div class="s-comments-layout-inner-comment-star__empty">
              @for($i = 0; $i < (5-$comment->getStar()); $i++)
                @icon('Star')
              @endfor</div>
          </div>
          <span class="s-comments-layout-inner__span"></span>

          <div class="s-comments-layout-inner-comment">
            <div class="s-comments-layout-inner-comment-info">
              <p class="s-comments-layout-inner-comment-info__name">{!! $comment->getNom()  !!}</p>
              <p class="s-comments-layout-inner-comment-info__job">{!! $comment->getJob()  !!}</p>
              <div class="s-comments-layout-inner-comment__date">{!! $comment->getDate()  !!}</div>
            </div>
          </div>
        </div>
      @endforeach
    </x-slider>
    @if($button)
      <div class="s-comments__button">
        <x-akyos-blocks::aky-button :appearance="$button['color']" :icon="$button['icon']" :iconposition="$button['iconposition']"
                  :href="$button['link']['url']" :borderradius="$button['borderradius']">
          {{ $button['link']['title'] }}
        </x-akyos-blocks::aky-button>
      </div>
    @endif
  </div>
</div>

