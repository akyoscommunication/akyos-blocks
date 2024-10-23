<div class="container s-number">
  <div class="s-number__title">
    <x-title :tag="$number1['title']['tag']">
      {!! $number1['title']['value'] !!}
    </x-title>
  </div>

  <div>
    {!! $number1['content'] !!}
  </div>

  <div class="s-number-layout">
  @foreach($number1['numbers'] as $key => $number)
    <div class="s-number-layout-inner">
    <x-image :lg="$number['icon']"/>
      <div class="s-number-layout-inner__number">
        {!! $number['number'] !!}
      </div>

      <div class="s-number-layout-inner__text">
        {!! $number['description'] !!}
      </div>

    </div>
  @endforeach
</div>

  @if($number1['button'])
    <div class="s-number__button">
      <x-button :appearance="$number1['button']['color']"
                :href="$number1['button']['link']['url']">
        {{ $number1['button']['link']['title'] }}
      </x-button>
    </div>
  @endif
</div>
