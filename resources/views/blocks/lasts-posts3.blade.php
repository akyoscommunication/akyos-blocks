<section style="{{ $styles }}" class="{{ $classes }} s-lasts-posts3">
  <div class="container">
    @if(isset($title))
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
    @endif
    @if(isset($description))
      {!! $description !!}
    @endif
    <div class="lasts-posts">
      @foreach($posts as $key => $post)
        <div class="post-3">
          <a href="{!! get_the_permalink($post->ID) !!}">
            <x-image :lg="get_the_post_thumbnail($post->ID)"/>
          </a>
          <div class="post-3-content">
            <div>
              <a class="post-3__category"
                 href="{!! get_term_link(get_the_terms($post->ID, $taxonomy)[0]->term_id) !!}">{!! get_the_terms($post->ID, $taxonomy)[0]->name !!}</a>
              <p class="post-3__date">{!! get_the_date('d/m/Y', $post->ID) !!}</p>
            </div>
            <x-title tag="h3">
              <a href="{!! get_the_permalink($post->ID) !!}">{!! get_the_title($post->ID)!!}</a>
            </x-title>
            <p>
              {!! get_the_excerpt($post->ID) !!}
            </p>
          </div>
        </div>
      @endforeach
    </div>

    @if($button && $button['link'])
      <x-button
        class="s-last-news-btn"
        href="{{ $button['link']['url'] }}"
        :target="$button['link']['target']"
        :appearance="$button['color']"
      >
        {!! $button['link']['title'] !!}
      </x-button>
    @endif
  </div>

</section>
