<header class="header-wrap">
	<div class="container header">

		<!-- LOGO -->
		<div class="header-brand">
			@if ($options['logo'])
				<a href="{!! home_url() !!}">
					<x-image :lg="$options['logo']" :sm="$options['logo_mobile']"></x-image>
				</a>
			@endif
		</div>
		<!----  --->

		<div class="header-nav">
			<div id="burger">
				<span></span>
			</div>
			<nav class="header-nav__burger">
				@menu('main_navigation')
			</nav>
		</div>

		@if(!empty($options['header_button']['url']))

			<div class="header-actions">

				@if(!empty($options['header_button']['url']))
					<div class="header-actions-buttons">
						<a href="{{ $options['header_button']['url'] }}">{{ $options['header_button']['title'] }}</a>
					</div>
				@endif

				@if($options['social'])
					@include('partials.social')
				@endif
			</div>
		@endif
  </div>
</header>
