<section style="{{ $styles }}" class="{{ $classes }} s-partners1">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}

    <div class="partners-logos">
      @foreach($partners as $partner)
      <x-image :lg="$partner['image']" />
      @endforeach
    </div>

  </div>
</section>