<section style="{{ $styles }}" class="{{ $classes }} s-blog1">
    <div class="container">
      <div class="filters">
        <div class="filters-list">
          <a href="{{ get_post_type_archive_link('post') }}" class="btn filter {{ empty(get_query_var('cat')) ? 'btn--active' : '' }}">
            <span>Tout voir <span>{{ count($posts) }}</span></span>
          </a>

          @foreach(get_categories() as $cat)
            <a href="{{ get_term_link($cat) }}"
               class="btn filter {{ get_query_var('cat') === $cat->term_id ? 'btn--active' : '' }}">
              <span>{{ $cat->name }} <span>{{ $postsByTerm[$cat->slug] }}</span></span>
            </a>
          @endforeach
        </div>
      </div>

      @if($posts)
        <div class="posts">
          @foreach($posts as $post)
            <div class="post-1">
              <a href="{!! get_the_permalink($post->ID) !!}">
                <x-image :lg="get_the_post_thumbnail($post->ID)"/>
              </a>
              <p class="post-1__date">{!! get_the_date('d/m/Y', $post->ID) !!}</p>
              <x-title tag="h3"><a href="{!! get_the_permalink($post->ID) !!}">{!! get_the_title($post->ID)!!}</a>
              </x-title>
              <a class="post-1__category"
                 href="{!! get_term_link(get_the_terms($post->ID, 'category')[0]->term_id) !!}">{!! get_the_terms($post->ID, 'category')[0]->name !!}</a>
              <p>
                {!! get_the_excerpt($post->ID) !!}
              </p>
            </div>
          @endforeach
        </div>

        @if($maxPages > 1)
          <div class="pagination">
            {!! $pagination !!}
          </div>
        @endif
      @else
        <p>Aucun article trouvé.</p>
      @endif

    </div>
</section>
