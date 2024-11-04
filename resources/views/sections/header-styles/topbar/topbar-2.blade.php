<div class="header-topbar header-topbar--style-{{ $header_topbar_style }}">
  <div class="header-topbar-layout container ">
    <div class="header-topbar-layout-inner">
      <div class="header-topbar-layout-inner__row">
        @icon('phone')
        <p>{!! $phone !!}</p>
      </div>
      <div class="header-topbar-layout-inner__row">
        @icon('email')
        <p>{!! $email !!}</p>
      </div>
    </div>
    <div class="header-topbar-layout__end">
      @icon('address')
      <p>{!! $address !!}</p>
    </div>
  </div>
</div>
