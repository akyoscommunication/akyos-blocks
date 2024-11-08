<div
  autoheight="{{ $autoheight }}"
  navigation="{{ $navigation }}"
  pagination="{{ $pagination }}"
  per-view-sm="{{ $per_sm }}"
  per-view-md="{{ $per_md }}"
  per-view-xs="{{ $per_xs }}"
  per-view="{{ $per }}"
  data-slider="{{ $name }}"
  gap="{{ $gap }}"
  {{ $attributes->merge(['class' => 'swiper '.$name.' '.$navigation]) }} slider>

  <div class="swiper-wrapper">
    {!! $slot !!}
  </div>

  @if($navigation === 'arrow')
    <div class="swiper-buttons">
      <div class="swiper-buttons-prev swiper-button-prev-{{$attributes['slider_id']}}">
        @icon('arrow')
      </div>
      @if($pagination === '1')
        <div class="swiper-pagination swiper-pagination-{{$attributes['slider_id']}}"></div>
      @endif
      <div class="swiper-buttons-next swiper-button-next-{{$attributes['slider_id']}}">
        @icon('arrow')
      </div>
    </div>
  @endif

</div>
