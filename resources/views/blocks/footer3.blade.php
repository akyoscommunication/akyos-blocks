@php $shortcode = "[forminator_form id=".$newsletter_form."]" @endphp


<section class="s-footer3">
  <div class="container">
    <div class="s-footer3-container">
      <div class="s-footer3-brand">
        <x-image :lg="$logo"/>
      </div>

      <div class="s-footer3-navigation">
        <p class="s-footer3-title-section">Menu</p>
        @menu('footer_navigation')
      </div>

      <div class="s-footer3-infos">
        @if($horaires)
          <div class="s-footer3-horaires">
            <p class="s-footer3-title-section">Horaires</p>
            {!! $horaires !!}
          </div>
        @endif

        @if($address)
          <div class="s-footer3-address">
            <p class="s-footer3-title-section">Contact</p>
            {!! $address !!}
          </div>
        @endif

        <div class="s-footer3-form">
          @if($newsletter_form)
            {!! do_shortcode($shortcode) !!}
          @else
            <form action="#">
              <input type="text" placeholder="Enter your email address">
              <button type="submit" class="btn btn--primary">Get started</button>
            </form>
          @endif
        </div>

        @if($description)
          <div class="s-footer3-description">
            {!! $description !!}
          </div>
        @endif
      </div>
    </div>

{{--    <div class="s-footer3-copyright">--}}
    {{--      <div class="s-footer3-copyright-nav">--}}
    {{--        <div class="s-footer3-copyright__copyright">--}}
    {{--          <p>&copy; Copyright {{ date('Y') }} {{ get_bloginfo('name') }}.</p>--}}
    {{--        </div>--}}
    {{--        <div class="s-footer3-copyright__legal-navigation">--}}
    {{--          @menu('legal_navigation')--}}
    {{--        </div>--}}
    {{--        <div class="s-footer3-copyright__creator">--}}
    {{--          <p>Réalisé par <a href="https://akyos.com">Akyos</a></p>--}}
    {{--        </div>--}}
    {{--      </div>--}}

    {{--      <div class="s-footer3-copyright__socials">--}}
    {{--        @if($display_socials)--}}
    {{--          @include('partials.social')--}}
    {{--        @endif--}}
    {{--      </div>--}}
    {{--    </div>--}}
  </div>
</section>
