<section style="{{ $styles }};" class="{{ $classes }} s-hero5 {{ $block['className'] ?? '' }}">
  @if($image && count($image) === 1 && $image = $image[0])
    <div class="s-hero5__bg">
      @if($image['acf_fc_layout'] == 'image' && !empty($image['image']))
      <x-image :lg="$image['image']" />
      @elseif($image['acf_fc_layout'] == 'video_youtube' && !empty($image['url']))
      <iframe src="{{ $image['url'] }}" frameborder="0"></iframe>
      @elseif($image['acf_fc_layout'] == 'video' && !empty($image['video']['url']))
      <video src="{{ $image['video']['url'] }}" autoplay muted loop loading="lazy"></video>
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
