<footer class="container  footer-option--style-{{ $options['footer_option_style'] }}">
    <div class="footer-option">
        <h2 class="footer-option__text">
            {!! $options['footer_option_text'] !!}
        </h2>

        <x-akyos-blocks::aky-button
            :appearance="$options['footer_option_button']['color']"
            :icon="$options['footer_option_button']['icon'] ?? ''"
            :iconposition="$options['footer_option_button']['iconposition']"
            :href="$options['footer_option_button']['link']['url']"
            :borderradius="$options['footer_option_button']['borderradius']"
        >
            {{ $options['footer_option_button']['link']['title'] }}
        </x-akyos-blocks::aky-button>

    </div>
</footer>
