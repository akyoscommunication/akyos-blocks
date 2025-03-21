@php $shortcode = "[forminator_form id=".$newsletter_form."]" @endphp


<section class="s-footer1">
  <div class="container">
    <div class="s-footer1-brand">
      <x-image :lg="$logo"/>
    </div>

    <div class="s-footer1-description">
      {!! $description !!}
    </div>

    <div class="s-footer1-navigation">
      @menu('footer_navigation')
    </div>

    <div class="s-footer1-horaires">
      {!! $horaires !!}
    </div>

    <div class="s-footer1-address">
      {!! $address !!}
    </div>

    <div class="s-footer1-form">
      @if($newsletter_form)
        {!! do_shortcode($shortcode) !!}
      @else
        <form action="#">
          <input type="text" placeholder="Enter your email address">
          <button type="submit" class="btn btn--primary">Get started</button>
        </form>
      @endif
    </div>

    <div class="s-footer1-creator">
      <p>Réalisé par <a href="https://akyos.com">Akyos</a></p>
    </div>

    <div class="s-footer1-copyright">
      <p>&copy; Copyright {{ date('Y') }} {{ get_bloginfo('name') }}.</p>
    </div>

    <div class="s-footer1-socials">
      @if($display_socials)
        @include('partials.social')
      @endif
    </div>

    <div class="s-footer1-legal-navigation">
      @menu('legal_navigation')
    </div>
  </div>
</section>
