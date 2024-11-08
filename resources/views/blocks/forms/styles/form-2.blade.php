<div class="container s-form">
  <div class="s-form-layout">
    @if($form2['title'])
      <x-title :tag="$form2['title']['tag']">
        {!! $form2['title']['value'] !!}
      </x-title>
    @endif
    <div class="s-form-formulaire">
      <div class="s-form-info">
        {!! $options['address'] !!}
        <div>
          @icon('phone'){!! $options['phone']!!}
        </div>
        <div>
          @icon('email'){!! $options['email'] !!}
        </div>
      </div>
      @shortcode('[forminator_form id="'.$form2['form'].'"]')
    </div>
    </div>
    <div class="s-form-pic">
      @if($form2['image_or_map'] === 'image')
        <div class="s-form__image">
          <x-image :lg="$form2['image']"/>
        </div>
      @endif
      @if($form2['image_or_map'] === 'map')
        <iframe
          src="{{ $form2['maps'] }}"
          style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      @endif
    </div>
  </div>
