<section style="{{ $styles }}" class="{{ $classes }} s-contact1">
  <div class="container">
    <div class="form-content">
      <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
      <div class="form-content-infos">
        @if($address)
          <p>{!! $options['address'] !!}</p>
        @endif
        @if($phone || $email)
          <div class="form-content-infos__contact">
            @if($phone)
              <a href="tel:+33{{ $options['phone'] }}">@icon('phone') {!! $options['phone'] !!}</a>
            @endif
            @if($email)
              <a href="mailto:{{ $options['email'] }}">@icon('email') {!! $options['email'] !!}</a>
            @endif
          </div>
        @endif
        @if($socials)
          @include('partials.social')
        @endif
      </div>
      @shortcode('[forminator_form id="'.$form.'"]')
    </div>
    <div class="form-image">
      <x-image :lg="$image"/>
    </div>
  </div>
</section>
