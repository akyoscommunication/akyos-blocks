@php $shortcode = "[forminator_form id=".$newsletter_form."]" @endphp


<section class="s-footer2">
  <div class="container">
    <div class="s-footer2-brand">
      <x-image :lg="$logo"/>
    </div>

    <div class="s-footer2-container">
      <div class="s-footer2-navigation">
        @menu('footer_navigation')
      </div>

      <div class="s-footer2-form">
        @if($newsletter_form)
          {!! do_shortcode($shortcode) !!}
        @else
          <form action="#">
            <input type="text" placeholder="Enter your email address">
            <button type="submit" class="btn btn--primary">Get started</button>
          </form>
        @endif
      </div>

      <div class="s-footer2-horaires">
        {!! $horaires !!}
      </div>

      <div class="s-footer2-address">
        {!! $address !!}
      </div>

      <div class="s-footer2-description">
        {!! $description !!}
      </div>
    </div>

    <div class="s-footer2-copyright">
      <div class="s-footer2-copyright-nav">
        <div class="s-footer2-copyright__copyright">
          <p>&copy; Copyright {{ date('Y') }} {{ get_bloginfo('name') }}.</p>
        </div>
        <div class="s-footer2-copyright__legal-navigation">
          @menu('legal_navigation')
        </div>
        <div class="s-footer2-copyright__creator">
          <p>Réalisé par <a href="https://akyos.com">Akyos</a></p>
        </div>
      </div>

      <div class="s-footer2-copyright__socials">
        @if($display_socials)
          @include('partials.social')
        @endif
      </div>
    </div>
  </div>
</section>
