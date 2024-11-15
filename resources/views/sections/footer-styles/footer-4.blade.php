<div class="container footer">
    <div class="footer-layout">
        <div class="footer-layout-inner">
            <div class="footer-layout-inner__image">
                <a class="" href="{!! home_url() !!}">
                    <x-image :lg="empty($options['footer_logo']) ? $options['logo'] : $options['footer_logo']"></x-image>
                </a>
            </div>
            <p class="footer-layout-inner__follow">Suivez-nous</p>
            <div>
                @if($options['facebook'])
                    <a href="{{ $options['facebook']}}" target="_blank">@icon("facebook")</a>
                @endif
                @if($options['instagram'])
                    <a href="{{ $options['instagram']}}" target="_blank">@icon("instagram")</a>
                @endif
                @if($options['linkedin'])
                    <a href="{{ $options['linkedin']}}" target="_blank">@icon("linkedin")</a>
                @endif
                @if($options['twitter'])
                    <a href="{{ $options['twitter']}}" target="_blank">@icon("twitter")</a>
                @endif
                @if($options['youtube'])
                    <a href="{{ $options['youtube']}}" target="_blank">@icon("youtube")</a>
                @endif
            </div>
        </div>
        <div class="footer-right">
            <span class="footer-bar"></span>
            <div class="footer-layout-info">
                <div class="footer-layout-info__address">
                    <p>{!! $options['footer_address'] !!}</p>
                </div>
                <div class="footer-layout-info__text">
                    {!! $options['footer_text'] !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-link">
    <div class="">
        @menu('legal_navigation')
    </div>
    <div class="">
          <span>© {{ bloginfo('name') }} {{ date('Y') }} | Une création <a
                  href="https://akyos.com" target="_blank">Akyos</a></span>
    </div>
</div>
