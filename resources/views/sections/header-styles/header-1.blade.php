@if($search)
  <div id="search-modal">
    <div class="container">
      @include('form.searchform')
      <div id="close-search">
        @icon('close')
      </div>
    </div>
  </div>
@endif

<header class="header-wrap {{ $transparent }}">

  <div class="container header">

    <!-- LOGO -->
    <div class="header-brand">
      @if ($logo)
        <a href="{!! home_url() !!}">
          <x-image :lg="$options['logo']" :sm="$options['logo_mobile']"></x-image>
        </a>
      @endif
    </div>
    <!----  --->

    <div class="header-nav">
      @if(!$onlyBurger)
        <nav class="header-nav__nav active-{{ $hover }}">
          @menu('main_navigation')
        </nav>
      @endif
      <div @if(!$onlyBurger) data-breakpoint="{{ $burgerBreakpoint }}" class="hidden" @endif id="burger">
        <span></span>
      </div>
      <nav class="header-nav__burger">
        {{--        <button id="close">@icon('close') Fermer</button>--}}
        @menu('main_navigation')
      </nav>
    </div>

    @if($search || $social || !empty($header_button['url']))

      <div class="header-actions">

        @if($search)
          <div class="header-actions-search">
            @icon('search')
          </div>
        @endif

        @if(!empty($header_button['url']))
          <div class="header-actions-buttons">
            <a href="{{ $header_button['url'] }}">{{ $header_button['title'] }}</a>
          </div>
        @endif

        @if($social)
          @include('partials.social')
        @endif

      </div>

    @endif

  </div>

</header>
