@php $shortcode = "[forminator_form id=".$newsletter_form."]" @endphp


<section class="s-footer2 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <div class="s-footer2-brand">
      <x-image :lg="$logo"/>
    </div>

    <div class="s-footer2-container">
      <div class="s-footer2-navigation">
        <p class="s-footer2-title-section">Menu</p>
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

      @if($horaires)
        <div class="s-footer2-horaires">
          <p class="s-footer2-title-section">Horaires</p>
          {!! $horaires !!}
        </div>
      @endif

      @if($address)
      <div class="s-footer2-address">
        <p class="s-footer2-title-section">Contact</p>
        {!! $address !!}
      </div>
      @endif

      @if($description)
        <div class="s-footer2-description">
          {!! $description !!}
        </div>
      @endif
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
