@include('akyos-blocks::sections.footer-styles.options.option-' . get_field('footer_option_style', 'option'))
<footer class="footer footer--style-{{ get_field('footer_style', 'option') }}">
    @include('akyos-blocks::sections.footer-styles.footer-' . get_field('footer_style', 'option'))
</footer>
