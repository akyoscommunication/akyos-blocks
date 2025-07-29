<section style="{{ $styles }}" class="{{ $classes }} s-lasts-posts4">
  <div class="container">
    <div class="lasts-posts">
      <x-slider name="lasts-posts-4" per="3" perMd="2" perSm="2" perXs="1" :modules="['navigation','pagination']"
        :extra="[ 'spaceBetween' => 24 ]">
        @foreach($posts as $post)
        <div class="swiper-slide">
          <div class="post-4">
            <a href="{!! get_the_permalink($post->ID) !!}">
              <x-image :lg="get_the_post_thumbnail($post->ID)" />
            </a>
            <div class="post-4-content">
              <a href="{!! get_term_link(get_the_terms($post->ID, $taxonomy)[0]->term_id) !!}"
                class="post-4__category">{!! get_the_terms($post->ID, $taxonomy)[0]->name !!}</a>
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
    <div class="lasts-posts-title">
      <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
      {!! $description !!}
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
  </div>
</section>