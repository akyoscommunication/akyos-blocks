<div class="header-topbar header-topbar--style-{{ get_field('header_topbar_style', 'option') }}">
  <div class="header-topbar-layout container ">
    <div class="header-topbar-layout-inner">
      <div class="header-topbar-layout-inner__row">
        @icon('phone')
        <p>{!! $options['phone'] !!}</p>
      </div>
      <div class="header-topbar-layout-inner__row">
        @icon('email')
        <p>{!! $options['email'] !!}</p>
      </div>
    </div>
    <div class="header-topbar-layout__end">
      @icon('address')
      <p>{!! $options['address'] !!}</p>
    </div>
  </div>
</div>
