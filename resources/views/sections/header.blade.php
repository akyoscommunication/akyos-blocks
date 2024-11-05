@if(get_field('header_topbar_style', 'option'))
	@include('akyos-blocks::sections.header-styles.topbar.topbar-'.get_field('header_topbar_style', 'option'))
@endif
<header class="header-wrap header--style-{{ $options['header_style'] }}">
  @include('akyos-blocks::sections.header-styles.header-' . $options['header_style'])
</header>
