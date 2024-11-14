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
        <!---- Navigation --->
        <div class="header-nav">
            <nav class="header-nav__nav">
                @menu('main_navigation')
            </nav>
            <div class="hidden" id="burger">
                <span></span>
            </div>
            <nav class="header-nav__burger">
                @menu('main_navigation')
            </nav>
        </div>
    </div>
</header>
