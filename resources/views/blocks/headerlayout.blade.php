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

<header class="h-wrap">
  @include('sections.topbar')
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
