<section style="{{ $styles }}" class="{{ $classes }} s-lasts-posts2 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    @if($posts)
    <div class="lasts-posts">
      <x-slider name="lasts-posts-2" :per="count($posts) < 4 ? count($posts) : 4" perMd="3" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 24 ]">
        @foreach($posts as $post)
        <div class="swiper-slide">
          <div class="post-2">
            <a href="{!! get_the_permalink($post->ID) !!}">
              <x-image :lg="get_the_post_thumbnail($post->ID)" />
            </a>
            <div class="post-2-content">
              <a href="{!! get_term_link(get_the_terms($post->ID, $taxonomy)[0]->term_id) !!}"
                class="post-2__category">{!! get_the_terms($post->ID, $taxonomy)[0]->name !!}</a>
              <x-title tag="h3"><a href="{!! get_the_permalink($post->ID) !!}">{!! get_the_title($post->ID)!!}</a>
              </x-title>
              <p>
                {!! get_the_excerpt($post->ID) !!}
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </x-slider>
      <div class="swiper-buttons">
        <div class="swiper-button-prev">
          @icon('arrow-slider-prev')
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next">
          @icon('arrow-slider-next')
        </div>
      </div>
    </div>
    @endif
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>