<div class="container footer">
    <div class="footer-layout">
        <div class="footer-layout-inner">
            <div class="footer-layout__image">
                <a class="" href="{!! home_url() !!}">
                    <x-image :lg="empty(get_field('footer_logo', 'option')) ? $options['logo'] : get_field('footer_logo', 'option')"></x-image>
                </a>
            </div>
            @if(get_field('footer_text', 'option'))
                <div class="footer-layout__text">
                    {!! get_field('footer_text', 'option') !!}
                </div>
            @endif
        </div>
        <div class="">
            @menu('footer_navigation')
        </div>

    </div>
    <div class="footer-layout-under">
        <div class="footer-info">
            <div class="">
                <p>{!! $options['address'] !!}</p>
            </div>
            <div class="">
          <span>© {{ bloginfo('name') }} {{ date('Y') }} | Une création <a
                  href="https://akyos.com" target="_blank">Akyos</a></span>
            </div>
        </div>

        <div class="footer-link">
            <div>
                @if($options['facebook'])
                    <a href="{{ $options['facebook']}}" target="_blank">@icon("facebook")</a>
                @endif
                @if($options['instagram'])
                    <a href="{{ $options['instagram'] }}" target="_blank">@icon("instagram")</a>
                @endif
                @if($options['linkedin'])
                    <a href="{{ $options['linkedin'] }}" target="_blank">@icon("linkedin")</a>
                @endif
                @if($options['twitter'])
                    <a href="{{ $options['twitter'] }}" target="_blank">@icon("twitter")</a>
                @endif
                @if($options['youtube'])
                    <a href="{{ $options['youtube'] }}" target="_blank">@icon("youtube")</a>
                @endif
            </div>
            <div class="">
                @menu('legal_navigation')
            </div>
        </div>
    </div>
</div>
