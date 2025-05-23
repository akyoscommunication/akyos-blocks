<section style="{{ $styles }}" class="{{ $classes }} s-single2">
  <div class="single-header">
    <x-image :lg="$image ?? get_the_post_thumbnail()"/>
    <div class="container--sm container">
      <p>{!! get_the_date('d/m/Y') !!}</p>
      <x-title tag="h1">{!! get_the_title() !!}</x-title>
    </div>
  </div>

  @if(get_field('repeater_content'))
    <div class="container container--sm">
      @foreach(get_field('repeater_content') as $el)
        <div class="single-text">
          {!! $el['content'] !!}
        </div>
        @if($el['images'])
          <div class="single-images">
            @foreach($el['images'] as $image)
              <x-image :lg="$image"/>
            @endforeach
          </div>
        @endif
      @endforeach
    </div>
  @endif
</section>
