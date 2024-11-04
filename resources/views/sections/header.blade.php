@if($header_topbar_style !== '')
@include('sections.header-styles.topbar.topbar-'.$header_topbar_style)
@endif
<header class="header-wrap header--style-{{ $header_style }}">
  @include('sections.header-styles.header-' . $header_style)
</header>
