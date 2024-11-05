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
            @if(!empty($options['header_button']['url']))
                <x-akyos-blocks::aky-button
                    appearance="primary"
                    :href="$options['header_button']['url']"
                >
                    {{ $options['header_button']['title'] }}
                </x-akyos-blocks::aky-button>
            @endif
        </div>
    </div>
</header>
