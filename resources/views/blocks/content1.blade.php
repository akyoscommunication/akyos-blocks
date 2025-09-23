<section style="{{ $styles }}" class="{{ $classes }} {{ $extra_class ?? '' }} s-content1 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container {{ $position }}">
    <div class="s-content1-content">
      <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
      <div class="c-text">
        {!! $content !!}
      </div>
      @if($button && $button['link'])
      <x-button :href="$button['link']['url']" :target="$button['link']['target']"
        :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
      @endif
    </div>
    @if($images)
    <div class="s-content1-image">
      <x-slider
        name="text-image"
        :per="1"
        :perMd="1"
        :perSm="1"
        :perXs="1"
        :modules="['navigation']"
        :extra="['spaceBetween' => 2]">
        @foreach($images as $image)
        <div class="swiper-slide">
          @if($image['acf_fc_layout'] == 'image')
          <x-image :lg="$image['image']" />
          @elseif($image['acf_fc_layout'] == 'video_youtube')
          <iframe src="{{ $image['url'] }}" frameborder="0"></iframe>
          @elseif($image['acf_fc_layout'])
          <x-image :lg="$image['acf_fc_layout']" />
          @else
          <x-image :lg="$image" />
          @endif
        </div>
        @endforeach
      </x-slider>
      @if(count($images) > 1)
        <div class="swiper-buttons">
          <div class="swiper-button-prev">
            @icon('arrow-slider-prev')
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next">
            @icon('arrow-slider-next')
          </div>
        </div>
      @endif
    </div>
    @endif
  </div>
</section>