<section style="{{ $styles }}" class="{{ $classes }} s-pricing1 @if(isset($block['className'])) {{ $block['className'] }} @endif">
  <div class="container">
    <x-title :tag="$title['tag']" :position="$title['position']">{!! $title['value'] !!}</x-title>
    {!! $description !!}
    <div class="prices-wrapper">
      <div class="prices">
        @foreach($prices as $price)
        <div class="price">
          <div class="price__top" style="background-color: {!! $price['color'] !!}">
            @if($price['popular'])
            <p>LE PLUS POPULAIRE</p>
            @endif
          </div>
          <div class="price-content">
            <h3>{!! $price['title'] !!}</h3>
            <p class="price-content__desc">{!! $price['description'] !!}</p>
            <div class="price-content__value">
              <p><b>{!! $price['price'] !!}€</b><span>/{!! $price['period'] !!}</span></p>
            </div>
            <div class="price-content-items">
              @foreach($price['list'] as $item)
              <div class="price-content-items__item">
                @icon('check')
                <p>{!! $item['item'] !!}</p>
              </div>
              @endforeach
            </div>
            @if($price['button'] && $price['button']['link'])
            <x-button :href="$price['button']['link']['url']" :target="$price['button']['link']['target']"
              :appearance="$price['button']['color']">{!! $price['button']['link']['title'] !!}</x-button>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @if($button && $button['link'])
    <x-button :href="$button['link']['url']" :target="$button['link']['target']"
      :appearance="$button['color']">{!! $button['link']['title'] !!}</x-button>
    @endif
  </div>
</section>