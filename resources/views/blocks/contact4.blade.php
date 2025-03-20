<section style="{{ $styles }}" class="{{ $classes }} s-contact4">
  <div class="container">
    <x-title :tag="$title['tag']">{!! $title['value'] !!}</x-title>
  </div>
  <div class="container">
    <div class="form-image">
      <x-image :lg="$image"/>
      <div class="form-content-infos">
        @if($address || $phone || $email)
          <div class="form-content-infos__contact">
            @if($address)
              <p>{!! $options['address'] !!}</p>
            @endif
            @if($phone || $email)
              <div>
                @if($phone)
                  <a href="tel:+33{{ $options['phone'] }}">@icon('phone') {!! $options['phone'] !!}</a>
                @endif
                @if($email)
                  <a href="mailto:{{ $options['email'] }}">@icon('email') <u>{!! $options['email'] !!}</u></a>
                @endif
              </div>
            @endif
          </div>
        @endif
        @if($socials)
          @include('partials.social')
        @endif
      </div>
    </div>
    <div class="form-content">
      @shortcode('[forminator_form id="'.$form.'"]')
    </div>
  </div>
</section>
