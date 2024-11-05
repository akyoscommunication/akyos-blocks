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
			 @menu('main_navigation')
		 </div>

		 @if(!empty($options['header_button']['url']))
			 <div class="header-actions">
				 <div class="header-actions-buttons">
					 <a href="{{ $options['header_button']['url'] }}">{{ $options['header_button']['title'] }}</a>
				 </div>
			 </div>
		 @endif
    </div>
</header>
