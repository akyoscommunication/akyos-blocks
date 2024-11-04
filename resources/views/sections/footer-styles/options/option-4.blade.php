<footer class="container  footer-option--style-{{ $footer_option_style }}">
  <div class="footer-option">
    <h2>
      {!! $footer_option_text !!}
    </h2>
  <x-button :appearance="$footer_option_button['color']" :icon="$footer_option_button['icon']" :iconposition="$footer_option_button['iconposition']"
            :href="$footer_option_button['link']['url']">
    {{ $footer_option_button['link']['title'] }}
  </x-button>
  </div>
</footer>
∂
