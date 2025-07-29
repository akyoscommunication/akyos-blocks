<section style="{{ $styles }}" class="{{ $classes }} s-lasts-posts5">
  <div class="container">
    @if(isset($title))
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    @endif
    @if(isset($description))
    {!! $description !!}
    @endif
    @if($posts)
    <div class="lasts-posts">
      @foreach($posts as $post)
      <div class="post-5">
        <a href="{!! get_the_permalink($post->ID) !!}">
          <x-image :lg="get_the_post_thumbnail($post->ID)" />
        </a>
        <a class="post-5__category" href="{!! get_term_link(get_the_terms($post->ID, $taxonomy)[0]->term_id) !!}">
          {!! get_the_terms($post->ID, $taxonomy)[0]->name !!}
        </a>
        <p class="post-5__date">{!! get_the_date('d/m/Y', $post->ID) !!}</p>
        <x-title tag="h3"><a href="{!! get_the_permalink($post->ID) !!}">{!! get_the_title($post->ID)!!}</a>
        </x-title>
        <p class="post-5__excerpt">
          {!! get_the_excerpt($post->ID) !!}
        </p>
      </div>
      @endforeach
    </div>
    @endif
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>