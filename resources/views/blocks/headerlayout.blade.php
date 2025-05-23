@if($search)
  <div id="search-modal">
  <div class="container">
    {!! get_search_form() !!}
    <div id="close-search">
        @icon('close')
      </div>
    </div>
  </div>
@endif

<header class="h-wrap">

  <div class="h-topbar">
    <div class="container">
      @if($phone && $options['phone'])
        <a href="tel:{{ $options['phone'] }}" class="h-topbar__phone">
          @icon('phone')
          {{ $options['phone'] }}
        </a>
      @endif
      @if($email && $options['email'])
        <a href="mailto:{{ $options['email'] }}" class="h-topbar__email">
          @icon('email')
          {{ $options['email'] }}
        </a>
      @endif
      @if($address && $options['address'])
        <span href="{{ $options['address'] }}" class="h-topbar__address">
            @icon('pin')
            {!! $options['address'] !!}
          </span>
      @endif
      @if($socials)
        @include('partials.social')
      @endif
      @if($button_topbar && $button_topbar['link'])
        <x-button :href="$button_topbar['link']['url']" :target="$button_topbar['link']['target']"
                  :appearance="$button_topbar['color']">{!! $button_topbar['link']['title'] !!}</x-button>
      @endif
    </div>
  </div>

  <div class="container h">

    <div class="h-brand">
      @if ($logo)
        <a href="{!! home_url() !!}">
          <x-image :lg="$logo"/>
        </a>
      @endif
    </div>

    <div class="h-nav">
      <nav class="h-nav__nav">
        @menu('main_navigation')
      </nav>

      <div class="h-nav__mobile">
        <div hidden id="burger">
          <span></span>
        </div>
        <div class="mobile-menu">
          @menu('mobile_navigation')
          @if($button && $button['link'])
            <x-button :href="$button['link']['url']" :target="$button['link']['target']"
                      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
          @endif
        </div>
      </div>
    </div>

    @if($search)
      <div class="h-actions">
        @if($search)
          <div class="h-actions-search">
            @icon('search')
          </div>
        @endif
      </div>
    @endif
  </div>
</header>
