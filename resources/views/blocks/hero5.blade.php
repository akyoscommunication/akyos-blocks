<section style="{{ $styles }};" class="{{ $classes }} s-hero5 {{ $block['className'] ?? '' }}">
  @if($image && count($image) === 1 && $image = $image[0])
    <div class="s-hero5__bg">
      @if($image['acf_fc_layout'] == 'image' && !empty($image['image']))
      <x-image :lg="$image['image']" />
      @elseif($image['acf_fc_layout'] == 'video_youtube' && !empty($image['url']))
      <iframe src="{{ $image['url'] }}&rel=0&autoplay={{ $image['autoplay'] ? '1' : '0' }}&mute={{ $image['mute'] ? '1' : '0' }}&controls={{ $image['show_controls'] ? '1' : '0' }}&loop={{ $image['loop'] ? '1' : '0' }}&showinfo={{ $image['show_info'] ? '1' : '0' }}" frameborder="{{ $image['frameborder'] ? '1' : '0' }}"></iframe>
      @elseif($image['acf_fc_layout'] == 'video' && !empty($image['video']['url']))
      <video src="{{ $image['video']['url'] }}" {{ $image['autoplay'] ? 'autoplay' : '' }} {{ $image['mute'] ? 'muted' : '' }} {{ $image['autoplay'] && !$image['mute'] ? 'muted video-unmute' : '' }} {{ $image['loop'] ? 'loop' : '' }} playsinline loading="lazy" data-default-volume="{{ $image['mute'] ? '0' : $image['default_volume'] }}"></video>
      @elseif($image['acf_fc_layout'] && !empty($image['acf_fc_layout']))
      <x-image :lg="$image['acf_fc_layout']" />
      @else
      <x-image :lg="$image" />
      @endif
    </div>
  @endif
  <div class="container">
    {!! \Akyos\Core\Helpers\print_component('title', $title, 'title') !!}
    <div class="c-text">
      {!! $description !!}
    </div>
    @if($buttons)
    <div class="buttons">
      @foreach($buttons as $button)
        @if(isset($button['button']['link']['url']) && !empty($button['button']['link']['url']))
        <x-button :href="$button['button']['link']['url']" :target="$button['button']['link']['target']"
          :appearance="$button['button']['color']">{!! $button['button']['link']['title'] !!}</x-button>
        @endif
      @endforeach
    </div>
    @endif
  </div>
</section>
