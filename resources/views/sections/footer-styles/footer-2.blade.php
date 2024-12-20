

<div class="container footer">
  <div class="footer-layout">
    <div class="footer-layout-inner">
      <div class="footer-layout__image">
        <a class="" href="{!! home_url() !!}">
          <x-image :lg="empty($footer_logo) ? $logo : $footer_logo"></x-image>
        </a>
      </div>
      <div class="footer-layout__menu">
        @menu('footer_navigation')
      </div>
    </div>
    <div class="footer-layout-inner">
      <div class="">
        <p>{!! $address !!}</p>
      </div>
      <div class="footer-layout__text">
        {!! $footer_text !!}
      </div>
    </div>
  </div>

  <div class="footer-info">
    <div class="">
      @menu('legal_navigation')
    </div>
    <div class="">
          <span>© {{ bloginfo('name') }} {{ date('Y') }} | Une création <a
              href="https://akyos.com" target="_blank">Akyos</a></span>
    </div>
    <div>
      @if($facebook)
        <a href="{{ $facebook}}" target="_blank">@icon("facebook")</a>
      @endif
      @if($instagram)
        <a href="{{ $instagram}}" target="_blank">@icon("instagram")</a>
      @endif
      @if($linkedin)
        <a href="{{ $linkedin}}" target="_blank">@icon("linkedin")</a>
      @endif
      @if($twitter)
        <a href="{{ $twitter}}" target="_blank">@icon("twitter")</a>
      @endif
      @if($youtube)
        <a href="{{ $youtube}}" target="_blank">@icon("youtube")</a>
      @endif
    </div>
  </div>
</div>
