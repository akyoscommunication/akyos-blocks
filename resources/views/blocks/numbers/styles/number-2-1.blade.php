<div class="container s-number">
  <div class="s-number__title">
    <x-title :tag="$number2['title']['tag']">
      {!! $number2['title']['value'] !!}
    </x-title>
  </div>

  <div>
    {!! $number2['content'] !!}
  </div>

  <div class="s-number-layout">
    @foreach($number2['numbers'] as $key => $number)
      <div class="s-number-layout-inner">
        <div class="s-number-layout-inner__number">
          {!! $number['number'] !!}
        </div>

        <div class="s-number-layout-inner__text">
          {!! $number['description'] !!}
        </div>

      </div>
    @endforeach
  </div>

  @if($number2['button'])
    <div class="s-number__button">
      <x-button :appearance="$number2['button']['color']" :icon="$number2['button']['icon']" :iconposition="$number2['button']['iconposition']"
                :href="$number2['button']['link']['url']">
        {{ $number2['button']['link']['title'] }}
      </x-button>
    </div>
  @endif
</div>
