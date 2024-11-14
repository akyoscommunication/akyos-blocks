<div class="container s-form">
    <div class="s-form-layout">
        @if($form2['title'])
            <x-title :tag="$form2['title']['tag']">
                {!! $form2['title']['value'] !!}
            </x-title>
        @endif
        <div class="s-form-formulaire">
            <div class="s-form-info">
                <div class="s-form-info__address">
                    {!! $options['address'] !!}
                </div>
                <div class="s-form-info__phone">
                    @icon('phone'){!! $options['phone']!!}
                </div>
                <div class="s-form-info__email">
                    @icon('email'){!! $options['email'] !!}
                </div>
                <div class="s-form-info__description">
                    {!! $form2['description'] !!}
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
            <div class="s-form__iframe">
                <iframe
                    src="{{ $form2['maps'] }}"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        @endif
    </div>
</div>
