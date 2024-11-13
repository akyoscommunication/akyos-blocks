<div class="container s-form">
  <div class="s-form-pic">
    @if($form1['image_or_map'] === 'image')
      <div class="s-form__image">
        <x-image :lg="$form1['image']"/>
      </div>
    @endif
    @if($form1['image_or_map'] === 'map')
      <div class="s-form__iframe">
        <iframe
          src="{{ $form1['maps'] }}"
          style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    @endif
  </div>
  <div class="s-form-layout">
    @if($form1['title'])
      <x-title :tag="$form1['title']['tag']">
        {!! $form1['title']['value'] !!}
      </x-title>
    @endif
    @if($form1['text'])
      <div>
        {!! $form1['text'] !!}
      </div>
    @endif
    @if($form1['name'])
      <div>
        {!! $form1['name'] !!}
      </div>
    @endif
    <div class="s-form-info">
      {!! $options['address'] !!}
      <div>
        Tél. : <span>{!! $options['phone']!!}</span>
      </div>
      <div>
        Mail : <span>{!! $options['email'] !!}</span>
      </div>
    </div>
    @if($form1['button'] && $form1['button']['link'])
      <x-akyos-blocks::aky-button :appearance="$form1['button']['color']" :icon="$form1['button']['icon']"
                :iconposition="$form1['button']['iconposition']"
                :href="$form1['button']['link']['url']" :borderradius="$form1['button']['borderradius']">
        {{ $form1['button']['link']['title'] }}
      </x-akyos-blocks::aky-button>
    @endif
  </div>
</div>
