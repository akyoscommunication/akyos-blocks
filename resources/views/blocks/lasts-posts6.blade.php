<section style="{{ $styles }}" class="{{ $classes }} s-lasts-posts6">
  <div class="container">
    <div class="lasts-posts-title">
      <div>
        <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
        {!! $description !!}
      </div>
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    <div class="lasts-posts">
      @foreach($posts as $post)
      <div class="post-6">
        <a href="{!! get_the_permalink($post->ID) !!}">
          <x-image :lg="get_the_post_thumbnail($post->ID)" />
        </a>
        <a class="post-6__category" href="{!! get_term_link(get_the_terms($post->ID, $taxonomy)[0]->term_id) !!}">
          {!! get_the_terms($post->ID, $taxonomy)[0]->name !!}
        </a>
        <x-title tag="h3"><a href="{!! get_the_permalink($post->ID) !!}">{!! get_the_title($post->ID)!!}</a>
        </x-title>
        <p class="post-6__excerpt">
          {!! get_the_excerpt($post->ID) !!}
        </p>
      </div>
      @endforeach
    </div>
  </div>
</section>