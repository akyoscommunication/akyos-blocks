<section style="{{ $styles }}" class="{{ $classes }} s-contact3">
  <div class="container">
    <div class="form-image">
      <x-image :lg="$image"/>
      <div class="form-content-infos">
        @if($address)
          <p>{!! $options['address'] !!}</p>
        @endif
        @if($phone)
          <a href="tel:+33{{ $options['phone'] }}">@icon('phone') {!! $options['phone'] !!}</a>
        @endif
        @if($email)
          <a href="mailto:{{ $options['email'] }}">@icon('email') {!! $options['email'] !!}</a>
        @endif
        @if($socials)
          @include('partials.social')
        @endif
      </div>
    </div>
    <div class="form-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      @shortcode('[forminator_form id="'.$form.'"]')
    </div>
  </div>
</section>
